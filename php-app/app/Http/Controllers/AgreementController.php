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
use App\Models\AgreementSite;
use Yajra\Datatables\Datatables;

class AgreementController extends Controller
{
    const ALL = 'all';
    
    /**
     * @var text
     */
    protected $redirect_path = '/admin/agreements';
    /**
     * @var Agreement
     */
    protected $agreement;

    /**
     * @param User $user
     * @param Role $role
     */
    public function __construct(Agreement $agreement)
    {
        $this->agreement = $agreement;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title       = trans('admin/agreements/general.page.index.title');
        $page_description = trans('admin/agreements/general.page.index.description');
        $agreements       = $this->agreement->leftJoin('agreement_site AS as', 
                                'agreements.id', '=', 'as.agreement_id')->with('projects')
                                ->groupBy('agreements.id')
                                ->orderBy('position')->orderBy('as.site_id', 'desc')->paginate(10);
        
        return view('admin.agreements.index', compact('agreements', 'page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $redirectUrl = $request->get('redirect-url');
        $page_title       = trans('admin/agreements/general.page.create.title');
        $page_description = trans('admin/agreements/general.page.create.description');
        $agreement        = '';
        
        $agreementList = $this->agreement->getAgreementPositionList();
        
        return view('admin.agreements.create', compact('agreement','page_title',
                    'page_description', 'redirectUrl', 'agreementList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->agreement->getValidationRules());
        
        $attributes = $request->all();
        $agreement = DB::transaction(function () use ($attributes, $request) {
            $position = $request->get('position', 0);
            $sites    = !empty($attributes['site']) ? $attributes['site'] : [];
            if (($request->get('agreement_type') == self::ALL) && !count($sites)) {
                $this->agreement->increasePosition($this->agreement->where('position', '>=', $position)->get());
            }

            $agreement = $this->agreement->create([
                'key'        => uniqid(Agreement::AGREEMENTS . '_'),
                'name'       => $attributes['name'],
                'position'   => $position,
                'active_si'  => $request->get('active_si'),
            ]);
            
            foreach ($sites as $site) {
                AgreementSite::create([
                    'agreement_id' => $agreement->id,
                    'site_id'      => $site
                ]);
            }
            return $agreement;
        });
        
        Audit::log(Auth::id(), ucfirst(Agreement::AGREEMENTS), 'Add New Agreement : '. $attributes['name'],
            []);
        
        Flash::success( trans('admin/agreements/general.status.created') ); // 'User successfully created');
        
        return redirect()->route('admin.agreement-file.create', ['id' => $agreement->id]);
    }
    
    
    public function dataTable()
    {		 
        return Datatables::of($this->agreement->query()->with('allFiles'))
        	->addColumn('extend',function ($data){
                    return '<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>';                    
                })
        	->addColumn('checkbox',function ($data){
                    return \Form::checkbox('chkAgreement[]', $data->id);        
                })
        	->addColumn('project_name',function ($data){
                    return $data->projects_name ? ucwords($data->projects_name) : 'All Projects';        
                })
        	->addColumn('agreements',function ($data){
                    return $data->allFiles()->count() . ' ' . ucfirst(($data->allFiles()->count() > 1) 
                                    ? Agreement::AGREEMENTS : Agreement::AGREEMENT);        
                })
        	->addColumn('agreement_position',function ($data){
                    return $data->position + 1;        
                })
                ->addColumn('action', function ($data) {
                    $action = '<a href="' . route('admin.agreement-file.create', $data->id) .
                                '" title="'.trans('admin/agreement-file/general.button.create').
                                '"><i class="fa fa-plus-square-o text-success"></i></a> '.
                                '<a href="' . route('admin.agreements.edit', $data->id) .
                                '" title="'. trans('general.button.edit'). 
                                '"><i class="fa fa-pencil-square-o"></i></a> ' .
                                '<a href="' . route('admin.agreements.confirm-delete', $data->id) . 
                                    '" data-toggle="modal" data-target="#modal_dialog"'.
                                    'title="' . trans('general.button.delete') . 
                                    '"><i class="fa fa-trash-o deletable"></i></a>';
                    return $action;     
                })
                ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agreement        = $this->agreement->with('projects')->find($id);
        
        if (!$agreement) {
            return redirect()->back()->withErrors(['agreement' => trans('admin/agreements/general.status.agreement-doesnot-exist')]);
        }
        $page_title       = trans('admin/agreements/general.page.edit.title');
        $page_description = trans('admin/agreements/general.page.edit.description', ['name' => $agreement->name]);
        $agreementList    = $this->agreement->getAgreementPositionList($id);

        return view('admin.agreements.edit', compact('agreement','page_title', 'page_description', 'agreementList'));
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
        $this->validate($request, $this->agreement->getValidationRules());
        
        $attributes = $request->all();
//        dd($attributes);
        $agreement  = $this->agreement->find($id);
        
        if (!$agreement) {
            return redirect()->back()->withErrors(['agreement' => trans('admin/agreements/general.status.agreement-doesnot-exist')]);
        }
        
        DB::transaction(function () use ($agreement, $request) {
            $position = $request->get('position', 0);
            $sites    = ($request->get('agreement_type') == self::ALL) ? [] : 
                            $request->get('site');
            
            if (!count($agreement->projects) && count($sites)) {
                $this->agreement->decreasePosition($this->agreement
                    ->where('position', '>', $agreement->position)->get());
            }
            
            if (count($agreement->projects) && !count($sites)) {
                $this->agreement->increasePosition($this->agreement
                    ->where('id', '!=', $agreement->id)
                    ->where('position', '>=', $agreement->position)->get());
            }
            
            if(($request->get('agreement_type') == self::ALL) && !count($sites) 
                    && ($agreement->position < $position)) {

                $this->agreement->decreasePosition($this->agreement->where('position', '>',
                    $agreement->position)->where('position', '<', $position)->get());
                $position = $position - 1;
            } elseif (($request->get('agreement_type') == self::ALL) && 
                    !count($sites) && ($agreement->position > $position)) {

                $this->agreement->increasePosition($this->agreement->where('position', '>=', 
                    $position)->where('position', '<', $agreement->position)->get());
            }

            $agreement->update([
                'name'       => $request->get('name'),
                'position'   => $position,
                'active_si'  => $request->get('active_si'),
            ]);
            AgreementSite::where('agreement_id', $agreement->id)->delete();
            
            foreach ($sites as $site) {
                AgreementSite::create([
                    'agreement_id' => $agreement->id,
                    'site_id'      => $site
                ]);
            }
        });
        Audit::log(Auth::id(), ucfirst(Agreement::AGREEMENTS), 'Updated Agreement : '.
            $attributes['name'], []);
        Flash::success( trans('admin/agreements/general.status.updated') ); // 'User successfully created');

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
        $agreement = $this->agreement->find($id);
        
        if (!$agreement) {
            return redirect()->back()->withErrors(['agreement' => trans('admin/agreements/general.status.agreement-doesnot-exist')]);
        }
        
        $modal_title = trans('admin/agreements/dialog.delete-confirm.title');
        $modal_route = route('admin.agreements.delete', array('id' => $agreement->id));
        $modal_body  = trans('admin/agreements/dialog.delete-confirm.body', ['name' => $agreement->name]);
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
        $agreement                = $this->agreement->find($id);
        $agreement_with_file_name = $this->agreement->where('doc_title', $agreement->doc_title)->first(); 
        
        if (!$agreement_with_file_name) {
            Flysystem::delete(Agreement::AGREEMENTS . '/'. $agreement->doc_title);
        }
        Audit::log(Auth::id(), ucfirst(Agreement::AGREEMENTS), 'Agreement Destroyed : '.$agreement->name);
        $agreement->delete();
        
        Flash::success( trans('admin/agreements/general.status.deleted') );
        
        return redirect('/admin/agreements');
    }

}
