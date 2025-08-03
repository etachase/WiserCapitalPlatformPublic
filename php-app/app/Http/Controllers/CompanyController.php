<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Role;
use App\Models\Meta;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use Flash;
use DB;
use App\Repositories\AuditRepository as Audit;
use Auth;
use Debugbar;
use Flysystem;

class CompanyController extends Controller
{
    const EXECUTED_AGREEMENTS = 'executed_agreement';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = trans('admin/companies/general.page.index.title');
        $page_description = trans('admin/companies/general.page.index.description');
        $companies = Company::paginate(25);
        return view('admin.companies.index', compact('page_title', 'page_description','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = trans('admin/companies/general.page.create.title');
        $page_description = trans('admin/companies/general.page.create.description');
        $type_mappings = Company::$type_mappings;
        $company = new Company();
        $roleName = "";
        return view('admin.companies.create', compact('page_title', 'page_description','type_mappings','company','roleName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validateFiles($request));
       // dd($request->all());
        $requestdata = $request->all();
        $role = Role::where('name', $request->type)->first();
        $requestdata['type'] = $role->id;
        $company = Company::create($requestdata);
        Audit::log(Auth::id(), ucfirst(Company::COMPANY), 'Add New Company : '.$company->name,
            ['id' => $company->id, 'type' => $company->type]);
		
        $fields = array_merge($company->getFillable(), [self::EXECUTED_AGREEMENTS, 
                        'delete_'. self::EXECUTED_AGREEMENTS, "_token" ]);
		$company_metas = collect($request->except($fields))->filter(function ($item) {
            return !(empty($item) && ($item !== '0') && ($item !== 0));
        });
        
     	$company->setMeta($company_metas->except('_token')->toArray());
		$company->save();
        
        $this->addFiles($request, $company);
        
        
        
        /* save solar installer data if it exists */
        if (isset($request['solar_installer_meta']) ) {
            
            foreach($request['solar_installer_meta'] as $key => $value)
            {
                if (empty($value) && ($value !== '0') && ($value !== 0))
                {
                    $company->unsetMeta($key);
                }
            }
            $company->setMeta($request['solar_installer_meta']);
            //$company->setMeta('company_id', $company->id);
            $company->save();

        }
        if($request->enable == 'y'){
            $url = URL::route('welcome');
        }else{
            $url = URL::route('companies.list');
        }

        Flash::success(trans('admin/companies/general.page.store.msg'));

        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $metas = $company->getMeta();
        $role = Role::where('id', $company->type)->first();
        $roleName = $role->name;
        //dd($roleName);
        $page_title = trans('admin/companies/general.page.edit.title');
        $page_description = trans('admin/companies/general.page.edit.description');
        $type_mappings = Company::$type_mappings;
        $is_update = true;
        return view('admin.companies.create', compact('page_title', 'page_description','type_mappings','is_update','company','roleName', 'metas'));
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
        $this->validate($request, $this->validateFiles($request));
        
        $company = Company::find($id);
        
        $data = $request->all();
        $role = Role::where('name', $request->type)->first();
        $data['type'] = $role->id;
        $data['is_shared'] = ($request->is_shared)? 1: 0;
        $company->update($data);
        $fields = array_merge($company->getFillable(), [self::EXECUTED_AGREEMENTS, 
                    'delete_'. self::EXECUTED_AGREEMENTS, "_method", "_token" ]);
        
		$company_metas = collect($request->except($fields))->filter(function ($item) {
            return !(empty($item) && ($item !== '0') && ($item !== 0));
        });        
        
        $company->setMeta($company_metas->except('_token')->toArray());
     	$company->save();
        
        $dKey = 'delete_'. self::EXECUTED_AGREEMENTS;
        if ($request->$dKey) {
            foreach ($request->$dKey as $file) {
                $files  = $company->getMeta(self::EXECUTED_AGREEMENTS) ? $company->getMeta(self::EXECUTED_AGREEMENTS) : [];
                $filePath = $files[$file];
                Flysystem::has($filePath) ? Flysystem::delete($filePath) : '';
                unset($files[$file]);
                count($files) ? $company->setMeta([ self::EXECUTED_AGREEMENTS => $files ])
                                : $company->unsetMeta(self::EXECUTED_AGREEMENTS);
            }
        }
        $this->addFiles($request, $company);
		
		Audit::log(Auth::id(), ucfirst(Company::COMPANY), 'Update Company : '.$company->name, ['id' => $company->id, 'type' => $company->type]);
        $url = URL::route('companies.list');
        Flash::success(trans('admin/companies/general.page.update.msg'));

        return redirect()->to($url);
    }
    /**
     * Function to validate files
     * 
     * @param Request $request
     */
    public function validateFiles(Request $request) 
    {
        $key = self::EXECUTED_AGREEMENTS;
        if (!$request->$key) {
            [];
        }
        $rules = [];
        for ($i = 0; $i < count($request->$key); $i++) {
            $rules[$key. '.'. $i] = 'max:64000';
        }
        return $rules;
    }
    
    /**
     * Function to add the files
     * 
     * @param Request $request
     * @param Company $company
     */
    public function addFiles(Request $request, Company $company) 
    {
        $s3DirPath = '/companies/'. $company->id . "/";
        $metaKey = self::EXECUTED_AGREEMENTS;
        if (!$request->$metaKey) {
            return;
        }
        $files = $company->getMeta($metaKey) ? $company->getMeta($metaKey) : [];
        foreach ($request->$metaKey as $file) 
        {
            if (!$file) 
            {
                continue;
            }
            $s3FilePath = $s3DirPath . $file->getClientOriginalName();
//            dd($s3FilePath);

            // check and remove folder and file on amazon server
            Flysystem::has($s3FilePath) ? Flysystem::delete($s3FilePath) : '';

            // put uploaded file on amazon server
            Flysystem::put($s3FilePath, fopen($file->getRealPath(), "r"),  [
                'Metadata' => [
                    'name' => $file->getClientOriginalName(),
                    'key'  => $s3DirPath
                ],
            ]);

            // set amazon path on site meta
            $files = array_merge($files, [
                $file->getClientOriginalName() => $s3FilePath
            ]);
        }
        $company->setMeta([$metaKey => $files]);
        $company->save();
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        Audit::log(Auth::id(), ucfirst(Company::COMPANY), 'Destroy Company : '.$company->name);
        Company::destroy($id);
        Flash::success(trans('admin/companies/general.page.destroy.msg'));
        return redirect()->route('companies.list');
    }
    /**
     * Delete Confirm Modal
     *
     * @param   int   $id
     * @return  View
     */
    public function getModalDelete($id)
    {
        $error = null;
        $company = Company::find($id);
        $modal_title = trans('admin/companies/dialog.delete-confirm.title');
        if ($company) {
            $modal_route = route('companies.delete', array('id' => $company->id));
            $modal_body = trans('admin/companies/dialog.delete-confirm.body');
        }
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));
    }
    public function dataTable()
    {
        return Datatables::of(Company::all())
            ->addcolumn('is_shared',function($data){
                return ($data->is_shared==1)? 'Yes': 'No';
            })
            ->addColumn('entity_type', function($data) {
                //Debugbar::info($data->metaData['entity_type']['value']);
                return (isset($data->metaData['entity_type']['value']) ? $data->metaData['entity_type']['value'] : '');
                
			})
            ->addColumn(self::EXECUTED_AGREEMENTS, function($data) {
                if (!empty($data->getMeta(self::EXECUTED_AGREEMENTS)) && 
                        is_array($data->getMeta(self::EXECUTED_AGREEMENTS))) {
                    $files = array_keys($data->getMeta(self::EXECUTED_AGREEMENTS));
                    return implode('<br/>', $files);
                }
                return '';
                
			})
			->addColumn('action', function($data) {
                return '<a href="'.URL::route( "companies.edit", array($data->id )).
                '"><i class="fa fa-pencil-square-o"></i></a> <a data-toggle="modal" data-target="#modal_dialog" href="'.
                URL::route( "companies.confirm-delete", array( $data->id )).'"><i class="fa fa-trash-o deletable"></i></a>';
			})
			->make(true);
    }
    
    /**
     * Downloadable Link
     * @param Request $request
     * @return json
     */
    public function downloadAgreement($id, Request $request)
    {
        $company = Company::find($id);

        $files      = $company->getMeta(self::EXECUTED_AGREEMENTS);
        $fileName   = $request->fileName;
        $s3Path     = isset($files[$fileName]) ? $files[$fileName] : '';
        $bucket     = config('flysystem.connections.awss3.bucket');
        $s3_client  = Flysystem::getAdapter()->getClient();
        $filePath   = $s3Path ? substr($s3Path, 1) : '';
        
        $cmd = $s3_client->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key'    => $filePath,
            'ResponseContentDisposition' => 'attachment; filename="'. $fileName . '"'
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

                unset($files[$fileName]);

                // set amazon path on site meta
                count($files) ? $company->setMeta([self::EXECUTED_AGREEMENTS => $files]) 
                                    : $company->unsetMeta(self::EXECUTED_AGREEMENTS);
                $company->save();
            }
            return response()->json(array('error' => true, 'message' => trans('hf/general.messages.s3-file-not-found')));
        }
        return response()->json(['path' => $presigned_url]);
    }
}
