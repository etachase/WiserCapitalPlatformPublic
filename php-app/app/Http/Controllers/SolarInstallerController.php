<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\SolarInstaller;
use App\Support\Dropdown;
use DougSisk\CountryState\CountryState;
use Flysystem;
use Auth;
use Flash;
use DB;
use App\Repositories\AuditRepository as Audit;

class SolarInstallerController extends Controller
{
    /**
     * @var SolarInstaller
     */
    protected $solar_installer;

    /**
     * @param User $user
     * @param Role $role
     */
    public function __construct(SolarInstaller $solar_installer)
    {
        $this->solar_installer = $solar_installer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = trans('admin/solar-installers/general.page.index.title');
        $page_description = trans('admin/solar-installers/general.page.index.description');
        
        $solar_installers = $this->solar_installer->leftJoin('sites_meta AS sm', function ($join) {
            $join->on('sm.value', '=', 'solar_installers.id')->where('sm.key', '=', 'solar_installer_id');
        })->select(DB::raw('count(sm.site_id) AS project, solar_installers.name, solar_installers.phone,'
                . ' solar_installers.website, solar_installers.business_location, solar_installers.id'))
                ->groupBy('solar_installers.id')->paginate(10);
        
        return view('admin.solar-installer.index', compact('page_title', 'page_description', 'solar_installers'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title       = trans('admin/solar-installers/general.page.create.title');
        $page_description = trans('admin/solar-installers/general.page.create.description');
        $wsar_status      = Dropdown::$wsar_status;
        $yes_no           = Dropdown::$yes_no;
        $country          = new CountryState();
        $states           = $country->getStates('US');
        $user_role_name   = 'solar-installer';

        return view('admin.solar-installer.create', compact('page_title',
                'page_description', 'wsar_status','yes_no', 'user_role_name','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, array_merge(array_merge([
            'solar_installer.name' => 'sometimes|required',
            'solar_installer.phone' => 'sometimes|required',
            'solar_installer.address' => 'sometimes|required',
            'solar_installer.zip_code' => 'sometimes|digits_between:4,10',
        ], config('constants.profile.solar_file_fields')), $this->solar_installer->validateMultiFiles($request)));
        
        if (!isset($request['solar_installer']) || empty($request['solar_installer']['name'])) {
            return back()->with('status','Company Name is required');   
        }
        $solarInstaller = $this->solar_installer->where('name', $request['solar_installer']['name'])->first();
        if ($solarInstaller) {
            return back()->withInput($request->all())->with('status','This company is already registered. Please contact support.');   
        }
        
        $solarInstaller = $this->solar_installer->create($request['solar_installer']);
        
        foreach($request['solar_installer_meta'] as $key => $value)
        {
            if (empty($value) && ($value !== '0') && ($value !== 0))
            {
                $solarInstaller->unsetMeta($key);
            }
        }
        $solarInstaller->setMeta($request['solar_installer_meta']);

        $solarInstaller->save();
        $this->solar_installer->deleteAndAddFiles($request, $solarInstaller->id);
        
        Audit::log(Auth::id(), ucfirst(SolarInstaller::SOLAR_INSTALLER), 'Add New Solar Installer : '.
            $solarInstaller->name, ['id' => $solarInstaller->id,
                'phone' => $solarInstaller->phone, 'website' => $solarInstaller->website]);
        
        Flash::success('Solar Installer Created Successfully');
        return redirect('/admin/solar-installers');
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
    public function edit($id, Request $request)
    {
        $solar_installer = $this->solar_installer->find($id);
        
        if (!$solar_installer) {
            return redirect()->back()->withErrors(['agreement' => trans('admin/solar-installers/general.status.si-doesnot-exist')]);
        }
        $page_title       = trans('admin/solar-installers/general.page.edit.title');
        $page_description = trans('admin/solar-installers/general.page.edit.description', ['name' => $solar_installer->name]);
        $wsar_status      = Dropdown::$wsar_status;
        $yes_no           = Dropdown::$yes_no;
        $profile_info     = $this->getProfileInfo($id);
        $country          = new CountryState();
        $states           = $country->getStates('US');
        $user_role_name   = 'solar-installer';
        
        if ($request->ajax()) {
            $projects = DB::table('sites_meta')->where('key', '=', 'solar_installer_id')
                    ->where('value', '=', $solar_installer->id)->count();
            $total_kw = SolarInstaller::getTotalKWInstalled($solar_installer->id);
            return \Auth::user()->hasRole('admins') ? response()->json(['status' => true, 
                'solar_installer' => $solar_installer, 'projects' => $projects,
                'total_kw' => $total_kw]) : response()->json(['status' => false]);
        }

        return view('admin.solar-installer.edit', array_merge(compact('page_title',
                'page_description', 'wsar_status','yes_no', 'user_role_name','states'), $profile_info));
    }
    /**
     * Return profile data according to the role of the user.
     * @return array
     */
    private function getProfileInfo($id) 
    {
        $solar_installer = SolarInstaller::find($id);
        $s3Helper = app('s3helper');
        $profile_info = [
            'solar_installer'      => $solar_installer, 
            'solar_installer_meta' => $solar_installer->getMeta(),
            'uploaded_files'       => $s3Helper->getAllUploadedFiles($solar_installer->getMeta(),
                                        'profile.solar_file_fields')
        ];
        return $profile_info;
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
        $this->validate($request, array_merge(array_merge([
            'solar_installer.name' => 'sometimes|required',
            'solar_installer.phone' => 'sometimes|required',
            'solar_installer.address' => 'sometimes|required',
            'solar_installer.zip_code' => 'sometimes|digits_between:4,10',
        ], config('constants.profile.solar_file_fields')), $this->solar_installer->validateMultiFiles($request)));
        
        if (!isset($request['solar_installer']) || empty($request['solar_installer']['name'])) {
            return back()->withInput($request->all())->with('status','Company Name is required');   
        }
        $solarInstaller = $this->solar_installer->where('name', $request['solar_installer']['name'])->first();
        if ($solarInstaller && $solarInstaller ->id != $id) {
            return back()->with('status','This company is already registered. Please contact support.');   
        }
        
        $solarInstaller = $this->solar_installer->find($id);
        if (!$solarInstaller) {
            return back()->with('status','Invalid solar installer.');   
        }
        
        $solarInstaller->update($request['solar_installer']);
        
        foreach($request['solar_installer_meta'] as $key => $value)
        {
            if (empty($value) && ($value !== '0') && ($value !== 0))
            {
                $solarInstaller->unsetMeta($key);
            }
        }
        $solarInstaller->setMeta($request['solar_installer_meta']);

        $solarInstaller->save();
        $this->solar_installer->deleteAndAddFiles($request, $solarInstaller->id);
        
        Audit::log(Auth::id(), ucfirst(SolarInstaller::SOLAR_INSTALLER), 'Updated Solar Installer : '.
            $solarInstaller->name, ['id' => $solarInstaller->id,
                'phone' => $solarInstaller->phone, 'website' => $solarInstaller->website]);
        
        Flash::success('Solar Installer Updated Successfully');
        return redirect(route('admin.solar-installers.edit', array('id' => $id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site_meta  = DB::table('sites_meta')->where('key', 'solar_installer_id')
                            ->where('value', $id)->first();
        $user_meta  = DB::table('users_meta')->where('key', 'solar_installer_id')
                            ->where('value', $id)->first();
        
        if ($site_meta || $user_meta) {
            Flash::error('Cannot remove SI. It has associations with a project or a user.'
                            . ' Remove associations to delete it.');
            return back();
        }
        $solarInstaller = SolarInstaller::find($id);
        Audit::log(Auth::id(), ucfirst(SolarInstaller::SOLAR_INSTALLER), 
                'Destroy Installer : '.$solarInstaller->name);
        
        SolarInstaller::destroy($id);

        Flash::success( trans('admin/solar-installers/general.status.deleted') );

        return redirect('/admin/solar-installers');
    }

    /**
     * Delete Confirm
     *
     * @param   int   $id
     * @return  View
     */
    public function getModalDelete($id)
    {
        $solar_installer = $this->solar_installer->find($id);
        
        $error       = null;
        $modal_title = trans('admin/solar-installers/dialog.delete-confirm.title');
        $modal_route = route('admin.solar-installers.delete', array('id' => $solar_installer->id));
        $modal_body  = trans('admin/solar-installers/dialog.delete-confirm.body', ['name' => $solar_installer->name]);
        
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));

    }
}
