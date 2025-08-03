<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agreement;
use Flysystem;
use Flash;
use App\Repositories\AuditRepository as Audit;
use Auth;
use DB;
use App\Models\AgreementFile;

class AgreementFileController extends Controller
{
    /**
     * @var text
     */
    protected $redirect_path = '/admin/agreements';
    /**
     * @var AgreementFile
     */
    protected $agreementFile;
    /**
     * @var Agreement
     */
    protected $agreement;

    /**
     * @param AgreementFile $agreementFile
     * @param Agreement $agreement
     */
    public function __construct(AgreementFile $agreementFile, Agreement $agreement)
    {
        $this->agreementFile = $agreementFile;
        $this->agreement     = $agreement;
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $agreement = $this->agreement->find($id);
        
        if (!$agreement) {
            return redirect()->back()->withErrors(['agreement' => trans('admin/agreements/general.status.agreement-doesnot-exist')]);
        }
        $page_title       = trans('admin/agreement-file/general.page.create.title');
        $page_description = trans('admin/agreement-file/general.page.create.description');
        $agreementFiles = $this->agreementFile->where('agreement_id', $id)->lists('name')->toArray();
        return view('admin.agreement-file.create', compact('page_title', 'page_description', 'id', 'agreementFiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agreement = $this->agreement->find($request->agreement_id);
        
        if (!$agreement) {
            return redirect()->back()->withInput(['errorMessage' => trans('admin/agreements/general.status.agreement-doesnot-exist')]);
        }
        $rules = $this->validateMultiFiles($request);
        if (!count($rules)) {
            return redirect()->back()->withInput(['errorMessage' => trans('admin/agreement-file/general.status.select-file')]);
        }
        $names   = $request->name;
        $enabled = $request->is_enabled;
        $success = '';
        $error   = '';
        $successfullyUploaded = 0;
        foreach ($request->uploaded_file as $index => $file) {
            if (!$file || ($file && !$file->getClientOriginalName())) {
                $error .= trans('admin/agreement-file/general.status.select-file', 
                                ['name' => ucwords(!empty($names[$index]) ? $names[$index] : '')]) . ' <br/>';
                continue;
            }
            
            $uploaded_file_name  = $file->getClientOriginalName();
            $uploaded_file_array = explode('.', $uploaded_file_name);
            $name                = !empty($names[$index]) ? $names[$index] : ucwords($uploaded_file_array[0]);
            $uploaded_file_ext   = end($uploaded_file_array);
            $sqs_file_name       = md5(uniqid(rand(), true)) . '.' . $uploaded_file_ext;

            if (!in_array($uploaded_file_ext, ['docx', 'pdf'])) {
                $error .= trans('admin/agreement-file/general.status.error-file-extension', 
                                ['name' => $name]) . ' <br/>';
                continue;
            }
            $s3FilePath = Agreement::AGREEMENTS . '/' . $sqs_file_name;

            if (Flysystem::has($s3FilePath)) {
                Flysystem::delete($s3FilePath);
            }

            Flysystem::put($s3FilePath, fopen($file->getRealPath(), "r"));
            $is_enabled = !empty($enabled[$index]) ? $enabled[$index] : 0;
            DB::transaction(function () use ($request, $name, 
                    $uploaded_file_name, $sqs_file_name, $is_enabled) {
                $agreementFile = $this->agreementFile->create([
                    'agreement_id'  => $request->agreement_id,
                    'name'          => $name,
                    'file_name'     => $uploaded_file_name,
                    'sqs_file_name' => $sqs_file_name,
                    'is_enabled'    => $is_enabled ? $is_enabled : 0,
                ]);
                Audit::log(Auth::id(), ucfirst(AgreementFile::AGREEMENTFILE), 
                    trans('admin/agreement-file/general.auth-log.msg-store', 
                        ['documentName' => $agreementFile->name, 'username' => auth()->user()->name]), 
                        ['filename' => $uploaded_file_name]);
            });
            $success .= trans('admin/agreement-file/general.status.success-file', ['name' => $uploaded_file_name]) . ' <br/>';
            $successfullyUploaded++;
        }
        if ($successfullyUploaded == count($request->uploaded_file)) {
            $message = trans('admin/agreement-file/general.status.created');
            Flash::success(($successfullyUploaded == 1) ?  $message : 'All ' . strtolower($message));
        } else {
            $success = $success ? "<b>Success : </b> <br/>". $success : '';
            $error   = "<b>Error : </b> <br/>" . $error;
        }
        return ($successfullyUploaded == count($request->uploaded_file)) ? redirect($this->redirect_path)
                : redirect()->back()->withInput(['successMessage' => $success, 'errorMessage' => $error]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agreementFile = $this->agreementFile->find($id);
        
        if (!$agreementFile) {
            return redirect()->back()->withErrors(['agreement' => trans('admin/agreement-file/general.status.document-doesnot-exist')]);
        }
        $page_title       = trans('admin/agreement-file/general.page.edit.title');
        $page_description = trans('admin/agreement-file/general.page.edit.description', ['name' => $agreementFile->name]);
        $agreementFiles = $this->agreementFile->where('agreement_id', $agreementFile->agreement_id)
                            ->where('id', '!=', $id)->lists('name')->toArray();

        return view('admin.agreement-file.edit', compact('agreementFile', 'page_title', 'page_description', 'agreementFiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->agreementFile->getValidationRules());
        
        $attributes = $request->all();
        
        $agreementFile  = $this->agreementFile->find($id);
        
        if (!$agreementFile) {
            return redirect()->back()->withErrors(['agreement' => trans('admin/agreement-file/general.status.document-doesnot-exist')]);
        }
        
        if ($request->file('uploaded_file') && 
            ($request->file('uploaded_file')->getClientOriginalName())) {
            
            $uploaded_file_name  = $request->file("uploaded_file")->getClientOriginalName();
            $uploaded_file_array = explode('.', $uploaded_file_name);
            $uploaded_file_ext   = end($uploaded_file_array);

            if (!in_array($uploaded_file_ext, ['docx', 'pdf'])) {
                return redirect()->back()->withErrors(['uploaded_file' => 'Please select file extension docx']);
            }
            $s3FilePath = Agreement::AGREEMENTS . '/' . $agreementFile->sqs_file_name;

            if (Flysystem::has($s3FilePath)) {
                Flysystem::delete($s3FilePath);
            }
            
            Flysystem::put($s3FilePath, fopen($request->file('uploaded_file')->getRealPath(), "r"));
        }
        
        DB::transaction(function () use ($agreementFile, $request) {
            $agreementFile->update([
                'name'       => $request->get('name'),
                'file_name'  => ($request->file('uploaded_file') && ($request->file('uploaded_file')
                                    ->getClientOriginalName())) ? $request->file('uploaded_file')->getClientOriginalName()
                                   : $agreementFile->file_name,
                'is_enabled' => $request->get('is_enabled') ? $request->get('is_enabled') : 0
            ]);
        });
        Audit::log(Auth::id(), ucfirst(AgreementFile::AGREEMENTFILE), 
            trans('admin/agreement-file/general.auth-log.msg-update', 
                ['documentName' => $agreementFile->name, 'username' => auth()->user()->name]), 
                ['filename' => !$request->file('uploaded_file') ? $attributes['doc_title']
                     : $request->file('uploaded_file')->getClientOriginalName()]);
        Flash::success( trans('admin/agreement-file/general.status.updated') ); // 'User successfully created');

        return redirect($this->redirect_path);
    }

    /**
     * Delete Confirm
     *
     * @param   int   $id
     * @return  View
     */
    public function getModalDelete($id)
    {
        $agreementFile = $this->agreementFile->find($id);
        
        if (!$agreementFile) {
            return redirect()->back()->withErrors(['agreement' => trans('admin/agreement-file/general.status.document-doesnot-exist')]);
        }
        
        $modal_title = trans('admin/agreement-file/dialog.delete-confirm.title');
        $modal_route = route('admin.agreement-file.delete', array('id' => $agreementFile->id));
        $modal_body  = trans('admin/agreement-file/dialog.delete-confirm.body', ['name' => $agreementFile->name]);
        $error       = '';
        
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agreementFile = $this->agreementFile->find($id);
        
        if (!$agreementFile) {
            return redirect()->back()->withErrors(['agreement' => trans('admin/agreement-file/general.status.document-doesnot-exist')]);
        }
        Flysystem::delete(Agreement::AGREEMENTS . '/'. $agreementFile->sqs_file_name);
        Audit::log(Auth::id(), ucfirst(AgreementFile::AGREEMENTFILE), 
                trans('admin/agreement-file/general.auth-log.msg-destroy', 
                        ['documentName' => $agreementFile->name, 'username' => auth()->user()->name]));
        $agreementFile->delete();
        
        Flash::success( trans('admin/agreement-file/general.status.deleted') );
        
        return redirect($this->redirect_path);
    }
    
    /**
     * Function to validate files
     * 
     * @param Request $request
     */
    public function validateMultiFiles(Request $request) 
    {
        $rules = [];
        $fileExist = false;
        foreach ($this->agreementFile->getValidationRules() as $key => $rule) {
            if (!$request->$key) {
                continue;
            }
            foreach ($request->$key as $index => $value) {
                
                if (($key == 'uploaded_file') && $value) {
                    $fileExist = true;
                }
                $rules[$key. '.'. $index] = $rule;
            }
        }
        return $fileExist ? $rules : [];
    }
    
    protected function getFileResponse($agreementFile)
    {
        Audit::log(Auth::id(), ucfirst(AgreementFile::AGREEMENTFILE), 
            trans('admin/agreement-file/general.auth-log.msg-destroy', 
                    ['documentName' => $agreementFile->name, 'username' => auth()->user()->name]));
        $agreementFile->delete();
        Flash::error(trans('admin/agreement-file/general.status.no-file-exist'));
        return response()->json(['error' => true]);
    }
    
    public function getDownloadableLink($id, Request $request)
    {
        $agreementFile = $this->agreementFile->find($id);
        
        if (!$agreementFile) {
            Flash::error(trans('admin/agreement-file/general.status.document-doesnot-exist'));
            return response()->json(['error' => true]);
        }
        
        if (!$agreementFile->sqs_file_name) {
            return $this->getFileResponse($agreementFile);
        }
        
        $s3Path = Agreement::AGREEMENTS . '/'. $agreementFile->sqs_file_name;
        $bucket   = config('flysystem.connections.awss3.bucket');
        $s3_client = Flysystem::getAdapter()->getClient();
        $cmd = $s3_client->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $s3Path,
            'ResponseContentDisposition' => 'attachment; filename='. $agreementFile->file_name
        ]);

        $presigned_request = $s3_client->createPresignedRequest($cmd, '+20 minutes');

        // Get the actual presigned-url
        $presigned_url = (string) $presigned_request->getUri();
        try {
            file_get_contents($presigned_url);
        } catch (\Exception $e) {
            if ($s3Path) {
            // check and remove folder and file on amazon server
                Flysystem::has($s3Path) ? Flysystem::delete($s3Path) : '';
            }
            
            return $this->getFileResponse($agreementFile);
        }
        return response()->json(['path' => $presigned_url]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function enable($id)
    {
        $agreementFile = $this->agreementFile->find($id);
        $agreementFile->is_enabled = 1;
        $agreementFile->save();
        Audit::log(Auth::id(), ucfirst(AgreementFile::AGREEMENTFILE), 'Enabled Agreement : '.$agreementFile->name);

        Flash::success(trans('admin/agreements/general.status.enabled'));

        return redirect($this->redirect_path);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function disable($id)
    {
        $agreementFile = $this->agreementFile->find($id);
        $agreementFile->is_enabled = 0;
        $agreementFile->save();
        Audit::log(Auth::id(), ucfirst(AgreementFile::AGREEMENTFILE), 'Disabled Agreement : '.$agreementFile->name);
        
        Flash::success(trans('admin/agreement-file/general.status.disabled'));

        return redirect($this->redirect_path);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function enableAll($id, Request $request)
    {
        $agreement = $this->agreement->find($id);
        $agreementFiles = $this->agreementFile->where('agreement_id', $id)->get();
        
        foreach ($agreementFiles as $agreementFile) {
            $agreementFile->is_enabled = 1;
            $agreementFile->save();
            Audit::log(Auth::id(), ucfirst(AgreementFile::AGREEMENTFILE), 'Enabled Agreement : '.$agreementFile->name);
        }

        Flash::success(trans('admin/agreement-file/general.status.global-enabled', ['name' => $agreement->name]));
        return redirect($this->redirect_path);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function disableAll($id, Request $request)
    {
        $agreement = $this->agreement->find($id);
        $agreementFiles = $this->agreementFile->where('agreement_id', $id)->get();
        
        foreach ($agreementFiles as $agreementFile) {
            $agreementFile->is_enabled = 0;
            $agreementFile->save();
            Audit::log(Auth::id(), ucfirst(AgreementFile::AGREEMENTFILE), 'Disabled Agreement : '.$agreementFile->name);
        }
        
        Flash::success(trans('admin/agreement-file/general.status.global-disabled', ['name' => $agreement->name]));
        return redirect($this->redirect_path);
    }
}
