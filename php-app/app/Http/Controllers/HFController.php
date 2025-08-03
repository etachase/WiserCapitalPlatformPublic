<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\SolarInstaller;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Auth;
use App\Repositories\AuditRepository as Audit;
use URL;
use DB;
use App\Support\Dropdown;
use App\Support\WSAR;
use App\Support\PPAOptimizer;
use Flysystem;
use Flash;
use App\Models\CompanySite;
use App\User;
use Input;
use App\Support\HFHelper;
use Illuminate\Pagination\Paginator;
use App\Helpers\Helper;
use App\Models\ProjectUser;
use App\Support\GreenButtonHelper;
use App\Models\UtilityProvider;
use Mail;
use App\Models\Maillog;

class HFController extends Controller
{
    const FACILITY_INFORMATION = 'facility_information';
    const GREEN_BUTTON         = 'file_green_button';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        /*
            ToDO
            figure out how to manage title and description
        */
        
        /*
         * why are we passing installer id? we can do this on the-back end on controller level just check here..
         *
         * When clicked on Number of Project for a SI in Admin > Security > Solar Installer, 
         * this installer id is passed from there to show the list only for the selected installer.
         * 
        */
        
        $search = Input::get('search');
        $page   = Input::get('page');
        
        
        $page_title = 'LIST OF ALL PROJECTS'; // trans('admin/users/general.page.index.title'); // "Admin | Users";
        $page_description = '';//trans('admin/users/general.page.index.description'); // "List of users";
                
        $user = Auth::user();
        $view = $user->getMeta('user_project_list_preferrence') ? $user->getMeta('user_project_list_preferrence') : User::GRIDVIEW;
        
        if ($id) {
            if(!Auth::user()->hasRole('admins')) {
                Flash::error(trans('general.error.non-authorized'));
                return back();
            }
            $solar_installer = SolarInstaller::find($id);
            if (!$solar_installer) {
                Flash::error('This SI doesn\'t exist');
                return back();
            }
		
            $page_title = trans('admin/solar-installers/general.page.project.title'); // trans('admin/users/general.page.index.title'); // "Admin | Users";
            $page_description = trans('admin/solar-installers/general.page.project.description', 
                                ['name' => $solar_installer->name]);
            $view = User::LISTVIEW;
        }
        //$site   = $this->getSites('', ['fileExist' => true]);
        
        $site   = $this->getSites('', ['fileExist' => true, 'gridView' => true, 'currentPage' => $page, 'search' => $search]);
        
        
        
		
	
        if(is_numeric($id) || count($site) || !empty($search)) {
            return view('hf.index', compact('page_title', 'page_description', 'id', 'view', 'search', 'page','site'));
        } else {
            return view('hf.index_get_started', compact('page_title', 'page_description', 'id', 'view'));
        }
    }
    
    public function getProject(Request $request)
    {
        $search = $request->get('q');
        return Site::where('name', 'LIKE', "$search%")->paginate(20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getModalCreate()
    {
        $modal_title = trans('hf/dialog.create.title');
        $modal_body = 'confirm';
        return view('modal_create_project', compact('error', 'modal_title', 'modal_body'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
	$name = $request->input('name');
	   
        /*$site = Site::find($id);

        $metas = $site->getMeta();
        $solar_installer = [];
        $solar_installer_meta = [];

        if ($solar_installer_model = $site->getSolarInstaller()) {
            $solar_installer = $solar_installer_model;
            $solar_installer_meta = $solar_installer_model->getMeta();
        }
        */
		
        Audit::log(Auth::user()->id, 'User', 'Create Host Facility.');
        $hfHelper = new HFHelper;
        
        return view('hf.create', $hfHelper->createView([
            'name' => $request->input('name')
        ]));
    }

    public function getSites($solar_installer_id = null, $data = array())
    {
        $company_id = Auth::user()->company_id;

        $id = Auth::id();
        $site = Site::leftJoin('user_favorite_sites AS ufs', function ($join) use ($id) {
                    $join->on('sites.id', '=', 'ufs.site_id')->where('ufs.user_id', '=', $id);
                });
        if(Auth::user()->hasRole('admins')) {
            if ($solar_installer_id) {
                $site_meta = DB::table('sites_meta')->where('key', 'solar_installer_id')
                                ->where('value', $solar_installer_id)->lists('site_id');
                $site->whereIn('sites.id', $site_meta);
            }
        } else {
            $site_ids = ProjectUser::where('user_id', $id)->lists('site_id');
            if($company_id && Company::isShared($company_id)) {
                $site->leftJoin('company_site AS cs', 'cs.site_id', '=', 'sites.id');
            }
            $site->where(function ($site) use ($company_id, $site_ids, $id) {
                ($company_id && Company::isShared($company_id)) ? 
                    $site->where('cs.company_id', $company_id) : 
                        $site->where('sites.user_id', $id);
                $site->orWhereIn('sites.id', $site_ids);
            });
        }
        
        if (!empty($data['siteExist'])) {
            return $site->first();
        }
        
        if (!empty($data['gridView'])) {
            $site->select('sites.*', 'ufs.id AS favorite_id', 'ufs.site_id AS favorite');
            
            // set current page
            $currentPage = !empty($data['currentPage']) ? $data['currentPage'] : '';
            Paginator::currentPageResolver(function() use ($currentPage) {
                return $currentPage;
            });
            
            if (!empty($data['search'])) {
                $search = $data['search'];
                $site->where(function ($site) use ($search) {
                    $site->where('sites.name', 'LIKE', "%$search%")
                        ->orWhere('sites.city', 'LIKE', "%$search%")
                        ->orWhere('sites.state', 'LIKE', "%$search%")
                        ->orWhere('sites.address', 'LIKE', "%$search%");
                });
            }
            return $site->orderBy('favorite', 'desc')->orderBy('sites.id', 'desc')->paginate(8);
        }
        
        return $site->orderBy('favorite', 'desc')->orderBy('sites.id', 'desc')
                    ->get(['sites.*', 'ufs.id AS favorite_id', 'ufs.site_id AS favorite']);
    }
    
    public function dataGrid()
    {
        $search = Input::get('search');
        $sites = $this->getSites('', [
            'gridView'    => true,
            'currentPage' => Input::get('currentPage'),
            'search'      => $search
        ]);
        
        $siteArray = [];
        $site_status      = Dropdown::$site_status;
        
        foreach($sites as $site) {
            
            array_push($siteArray, [
                'id'                        => $site->id,
                'favorite'                  => $site->favorite_id,
                'name'                      => Helper::strLength($site->name, 22),
                'profileUrl'                => route( "hf.facility-profile", $site->id ),
                'confirmDelete'             => route( "hf.confirm-delete", $site->id ),
                'trans_delete'              => trans('general.button.delete'),
                'userFavoriteProjectDelete' => route('user.favorite.projects.delete', $site->favorite_id),
                'userFavoriteProjectStore'  => route('user.favorite.projects.store', $site->id),
                'address'                   => $site->address,
                'full_address'              => $site->city . ', ' . $site->state . ' ' . $site->zip_code,
                'system_size'               => intval($site->getSystemSize()),
                'current_electric_pricing'  => $site->getAvoidedElectricCost(),
                'utility_provider'          => $site->getUtility(),
                'site_status'               => !empty($site_status[$site->status]) ? 
                                                $site_status[$site->status] : 'XXXX',
                'updated_at'                => date_format($site->updated_at, 'F d')
            ]);
        }
        
        $pagination = $sites->render();
        if ($search) {
            $pagination = str_replace('/datagrid?', "?search=$search&", $pagination);
        }
        
        return response()->json(array('siteArray' => $siteArray, 'pagination' => str_replace('/datagrid', '', $pagination)));
    }
    
    public function dataTable($solar_installer_id = null)
    {
	$site = $this->getSites($solar_installer_id);
        
        return Datatables::of($site)
            ->editColumn('name',function ($data){
                /*
                    clean-up the url construction
                */
                return '<a href="'.url(route('hf.facility-profile', ['id' => $data->id])).'">'.$data->name.'</a>';
            })
            ->addColumn('favorite',function ($data){
                if ($data->favorite_id) {
                    $variable = '<a href="' .route('user.favorite.projects.delete',
                                    $data->favorite_id). '" title="'.
                                    trans('general.button.delete'). '"> ' . 
                                    '<i class="fa fa-star"></i></a>';
                } else {
                    $variable = '<form action="'. route('user.favorite.projects.store',
                                    $data->id) .'" method="POST" id="favorite-site-'.$data->id.'"> '
                                    . '<input type="hidden" name="_token" />'
                                    . '<i class="fa fa-star-o" id="favorite-site-icon-'.$data->id.'"'
                                    . ' style="cursor:pointer" data-id="'.$data->id.'"></form>';                    
                }
                return $variable;
            })
            ->addColumn('status',function ($data){
                $site_status = Dropdown::$site_status;
                $variable = !empty($site_status[$data->status]) ? $site_status[$data->status] : '----';
                if (Auth::user()->hasRole('admins')) {
                    $variable = "<select class='form-control' id='status' data-id='$data->id'".
                            "value='$data->status' style='width: 60%' onchange='statusSelected(this)'".
                            'onfocus="statusPrevious(this)"><option value="">Select a status</option>';

                    foreach ($site_status as $key => $status) {
                        $variable.= "<option value='$key' ".($data->status == $key ? "selected='selected'" : '').">$status</option>";
                    }
                }
                return $variable;
            })
            ->addColumn('action', function($data) {
                return view('hf.action_dropdown', ['id' => $data->id])->render();

            })->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMap(Request $request)
    {
        /*
	        Todo, check if variable exists before submitting and clean-up..make sure to make filename unique
        */
		
        $site = Site::find($request->id);
		
        $site->address = $request->address;
        $site->city = $request->city;
        $site->zip_code = $request->zip_code;
        $site->state = $request->state;
        $site->map_json = $request->map_json;
        $site->area = $request->area;
		$site->save();
		

        /*$map = $request->input('screenshot');
		$map = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $map));
		file_put_contents(storage_path('files/map-screenshots/screenshot.png'), $map);
		$s3DirPath = $site->id . '/map-screenshot/' ;
        $s3FilePath = $s3DirPath . 'screenshot.png';
     
        if (Flysystem::has($s3DirPath)) {
            Flysystem::deleteDir($s3DirPath);
        }
        Flysystem::put($s3FilePath, file_get_contents(storage_path('files/map-screenshots/screenshot.png')), ['visibility' => 'public']);
        */
        if($request->edit_map == 1)
        {
	        $url = URL::route('hf.facility-profile', $site->id);
        }
        else
        {
	        $url = URL::route('hf.preliminary-assessment', $site->id);

        }
        
        Audit::log(Auth::id(), Site::SITE_DATA, 'Store Map data : '. $site->name, 
                ['map_json' => $request->map_json]);
		
        return redirect()->to($url);
    }
    
    public function map($id)
    {
        $site = Site::find($id);
        $page_title = 'MAP PROJECT'; // trans('admin/users/general.page.index.title'); // "Admin | Users";
        $page_description = $site->name;//trans('admin/users/general.page.index.description'); // "List of users";
        return view('hf.map', compact('page_title', 'page_description', 'site'));
    }
    
    public function editMap($id)
    {
        $site = Site::find($id);
        $page_title = 'MAP PROJECT'; // trans('admin/users/general.page.index.title'); // "Admin | Users";
        $page_description = $site->name;//trans('admin/users/general.page.index.description'); // "List of users";
        return view('hf.edit-map', compact('page_title', 'page_description', 'site'));
    }
 
    public function store(Request $request)
    {
        $this->validate($request, $this->validateFiles($request));
        if ($request->get('utility_provider') && !(UtilityProvider::find($request->get('utility_provider')) || 
                    ($request->get('utility_provider') == Dropdown::NONE))) {
            return back()->withErrors([
                'utility_provider' => trans('hf/general.messages.valid-utility-provider')
            ])->withInput($request->all());
        }
        
        $user       = Auth::user();
        $company_id = $user->company_id;

        Audit::log(Auth::user()->id, 'User', 'Created a new project.', $request->all());
		$request->request->add(['user_id' => $user->id]);
        $site = Site::create($request->all());
        
        /*
	        see why it's submitting toolbar, address_search
        */
		
        $post_metas = collect($request->except('name', '_token', '_method', 'address', 
                    'address_search', 'city', 'state', 'zip_code', 'country', 'toolbar', 
                    'file_support_solar_array','file_12_months_utility_bill', 'file_system_production_modelling', 
                    'file_green_button', 'file_fit_agreement', 'file_signed_site_lease'))->filter(function ($item) {
            return !(empty($item) && ($item !== '0') && ($item !== 0));
        });
        
        $this->addFiles($request, $site->id);
        $site->save();

        $site->setMeta($post_metas->all());
        $site->status = Dropdown::PRELIMINARY_PPA_QUOTE;
        $site->save();
        
        if ($company_id) {
            CompanySite::create(['company_id' => $company_id, 'site_id' => $site->id]);
        }

        if($user->hasRole(\App\Models\Role::TYPE_SOLAR_INTEGRATOR)) {
            $solar_installer_id = $user->getMeta('solar_installer_id');
            if($solar_installer_id){
                $site->setMeta('solar_installer_id', $solar_installer_id);
                $site->save();
            }
        }
		/*
        $map = $request->input('screenshot');
		$map = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $map));
		file_put_contents(storage_path('files/map-screenshots/screenshot.png'), $map);
		$s3DirPath = $site->id . '/map-screenshot/' ;
        $s3FilePath = $s3DirPath . 'screenshot.png';

     
        if (Flysystem::has($s3DirPath)) {
            Flysystem::deleteDir($s3DirPath);
        }
        Flysystem::put($s3FilePath, file_get_contents(storage_path('files/map-screenshots/screenshot.png')), ['visibility' => 'public']);
        */
        $url = URL::route('hf.results', $site->id);
        
        //Audit::log(Auth::id(), Site::SITE_DATA, 'Store Map data : '. $site->name, ['map_json' => $request->map_json, 'filepath' => $s3FilePath]);

        /*
        Flysystem::has($s3DirPath) ? Flysystem::deleteDir($s3DirPath) : '';
        Flysystem::put($s3FilePath, 
            file_get_contents(storage_path('files/map-screenshots/screenshot.png')), 
            ['visibility' => 'public']);
        
        $url = URL::route('hf.results', $site->id);
        */

		
        return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $WSAR  = new WSAR($id);
        $site  = Site::find($id);
        $error = '';
        
        
        $solar_installer     = SolarInstaller::getList();
        $ongoing_system_cost = $site->getMeta('ongoing_system_cost');
        if (is_array($ongoing_system_cost)) {
            foreach ($ongoing_system_cost as $cost_value) {
                $error = $error ? $error : (($cost_value != Dropdown::ONGOING_NONE) ? true : false);
            }
        }
        
        Audit::log(Auth::user()->id, 'User', 'Edit Host Facility', ['id' => $id]);
        $hfHelper =  new HFHelper;
        return view('hf.edit', $hfHelper->editView([
            'site'              => $site,
            'solar_installer'   => $solar_installer,
            'WSAR'              => $WSAR,
            'error'             => $error,
            'active_tab'        => (back()->getTargetUrl() == route('hf.edit', $id)) ? $site->getMeta('active_tab') : '',
        ]));
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
        
        if ($request->get('utility_provider') && !(UtilityProvider::find($request->get('utility_provider')) || 
                    ($request->get('utility_provider') == Dropdown::NONE))) {
            return back()->withErrors([
                'utility_provider' => trans('hf/general.messages.valid-utility-provider')
            ])->withInput($request->all());
        }
        $site = Site::find($id);
        $site->update($request->all());
        
        $post_metas = collect($request->except('name', '_token', '_method', 'file_12_months_utility_bill', 'file_support_solar_array', 'file_roof_warranty',
                        'file_system_production_modelling', 'file_3_years_financials', 'file_2_years_tax_return', 'file_signed_site_lease', 
                        'file_subordination_non_disturbance_agreement', 'file_title_insurance', 'file_fit_agreement',
                        'file_roof_penetration_warranty','file_green_button', 'delete_file_12_months_utility_bill', 'delete_file_support_solar_array', 'delete_roof_warranty',
                        'delete_file_system_production_modelling', 'delete_file_3_years_financials',
                        'delete_file_2_years_tax_return', 'delete_file_title_insurance', 'delete_file_fit_agreement',
                        'delete_file_subordination_non_disturbance_agreement', 'delete_file_signed_site_lease', 
                        'delete_file_roof_penetration_warranty','delete_file_green_button'))->filter(function ($item) {
            return !(empty($item) && ($item !== '0') && ($item !== 0));
        });
        
        $fileFieldsMapping = config('constants.hf.file_fields_mapping');

        /*
         * check for deleted files
         * Right now we are just removing from our meta
         */
        foreach (array_keys(config('constants.hf.file_fields')) as $fieldName) {
            $field  = 'delete_' . $fieldName;
            if (!$request->$field) {
                continue;
            }
            $metaKey   = empty($fileFieldsMapping[$fieldName]) ? self::FACILITY_INFORMATION. $fieldName   : $fileFieldsMapping[$fieldName]['field_name'];
            
            if ($fieldName == self::GREEN_BUTTON) {
                $files  = $site->getMeta($metaKey);
                $filePath = !empty($files['filepath']) ? $files['filepath'] : '';
                Flysystem::has($filePath) ? Flysystem::delete($filePath) : '';
                $site->unsetMeta($metaKey);
                continue;
            }
            foreach ($request->$field as $file) {
                $files  = $site->getMeta($metaKey) ? $site->getMeta($metaKey) : [];
                $filePath = $files[$file]['filePath'];
                Flysystem::has($filePath) ? Flysystem::delete($filePath) : '';
                unset($files[$file]);
                count($files) ? $site->setMeta([ $metaKey => $files ]) : $site->unsetMeta($metaKey);
            }
        }
        $this->addFiles($request, $id);
        //check for files and validate

        foreach($request->except('name', '_token', '_method') as $key => $value) 
        {
            (empty($value) && ($value !== '0') && ($value !== 0)) ? $site->unsetMeta($key) : '';
        }
        $site->setMeta($post_metas->all());
        $site->save();
        
        Audit::log(Auth::id(), Site::SITE_DATA, 'Updated project information : '. $site->name);
        Flash::success(trans('Project Information Updated successully!'));
        return redirect()->route('hf.edit', $site->id);
    }

    /**
     * Delete Confirm
     *
     * @param   int   $id
     * @return  View
     */
    public function getModalDelete($id)
    {
        $error       = null;
        $site        = Site::find($id);
        $modal_title = trans('hf/dialog.delete-confirm.title');

        if ($site) {
            $modal_route = route('hf.delete', array('id' => $site->id));
            $modal_body  = trans('hf/dialog.delete-confirm.body');
        }
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
        $site = Site::find($id);
        Audit::log(Auth::id(), Site::SITE_DATA, 'Site destroyed : '. $site->name);
        Site::destroy($id);
        return redirect()->route('hf.index');
    }

    public function WSARScore($id)
    {
        $WSAR       = new WSAR($id);
        $wsar_score = $WSAR->WSARScore();
        $site = Site::find($id);
        
        $page_title = 'WISER SOLAR ASSET RATING'; // trans('admin/users/general.page.index.title'); // "Admin | Users";
        $page_description = '';//trans('admin/users/general.page.index.description'); // "List of users";

        return view('hf.wsar_score', compact('page_title', 'page_description','wsar_score', 'WSAR', 'id', 'site'));

    }

    public function facilityProfile($id)
    {
        $site = Site::find($id);
        $metas = $site->getMeta();
        
        $WSAR = new WSAR($id);
        $ppa = new PPAOptimizer($id); 
        
	
		
        
		$ppa_result = $site->getMeta('ppa');
		
		$bucket = config('flysystem.connections.awss3.bucket');
		$region = config('flysystem.connections.awss3.region');
	
		//$screenshot = 'https://s3-'.$region.'.amazonaws.com/'.$bucket.'/'.$id . '/map-screenshot/screenshot.png';
		
		/*
			TODO:
			clean up how we create url
		*/

		
        $facility_type = Dropdown::$facility_types;
        $system_location = Dropdown::$system_location;

        $page_title = 'FACILITY PROFILE'; // trans('admin/users/general.page.index.title'); // "Admin | Users";
        $page_description = '';//trans('admin/users/general.page.index.description'); // "List of users";

        if(isset($metas['system_location']) && is_array($metas['system_location']) && count($metas['system_location'])) {
            foreach($metas['system_location'] as $locationKey) {
                $system_locations[] = $system_location[$locationKey];
            }
        }
        return view('hf.facility_profile', compact('page_title', 'page_description',
            'site', 'metas','facility_type','system_locations', 'WSAR', 'ppa_result', 'screenshot'));
    }
    
    public function calculatePPA($id)
    {
	  
	    
	    $site = Site::find($id);
	    $PPA = new PPAOptimizer($id);
        dd($PPA->ppa());
    }
    
    /**
     * Update site status
     * 
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function changeSiteStatus(Request $request, $id) 
    {
        // check if user is not admin
        if (!Auth::user()->hasRole('admins')) {
            return response()->json(['status' => 'bg-danger', 'title' => 'Error Message', 
                'message' => 'You are not authorized to update the status']);
        }
        
        // check if site is not found
        $site = Site::find($id);
        if (!$site) {
            return response()->json(['status' => 'bg-danger','title' => 'Error Message', 'message' => 'Site doesn\'t exist']);
        }
        $status = DropDown::$site_status;
        
        // check if value is not in array
        if (empty($status[$request->status])) {
            return response()->json(['status' => 'bg-danger', 'title' => 'Error Message', 'message' => 'Invalid Status']);
        }
        
        // set site status in meta
        $site->update(['status' => $request->status]);
        Audit::log(Auth::id(), Site::SITE_DATA, 'Change site status : '. $site->name,
            ['status' => $status[$request->status]]);
        
        return response()->json(['status' => 'bg-success', 'title' => 'Success Message', 'message' => 'Status saved successfully']);
    }
    
    /**
     * Function to validate files
     * 
     * @param Request $request
     */
    public function validateFiles(Request $request) 
    {
        $rules = [];
        foreach (config('constants.hf.file_fields') as $key => $rule) {
            if (!$request->$key) {
                continue;
            }
            if ($key == self::GREEN_BUTTON) {
                $rules[$key] = $rule;
                continue;
            }
            foreach ($request->$key as $index => $file) {
                $rules[$key. '.'. $index] = $rule;
            }
        }
        return $rules;
    }
    
    /**
     * Function to add the files
     * 
     * @param Request $request
     * @param type $id
     */
    public function addFiles(Request $request, $id) 
    {
        $site = Site::find($id);
        if (!$site) {
            return '';
        }
        
        $fileFieldsMapping = config('constants.hf.file_fields_mapping');
        $fileFields = array_keys(config('constants.hf.file_fields'));
        foreach ($fileFields as $fieldName) 
        {
            if (!$request->$fieldName) 
            {
                continue;
            }
            
            $dr_dir     = !empty($fileFieldsMapping[$fieldName]) ?  ''  : self::FACILITY_INFORMATION;
            $dr_id      = empty($fileFieldsMapping[$fieldName]) ? $fieldName  : $fileFieldsMapping[$fieldName]['file_name'];
            
            $s3DirPath  = $id ."/". $dr_dir. '/'. $dr_id. "/";
            
            $metaKey    = $dr_dir. '_'. $dr_id;
            
            if ($fieldName == self::GREEN_BUTTON) 
            {
                $file = $request->$fieldName;
                $s3FilePath = $s3DirPath . $file->getClientOriginalName();
                
                // put uploaded file on amazon server
                Flysystem::put($s3FilePath, fopen($file->getRealPath(), "r"));

                // set amazon path on site meta
                $site->setMeta([ $metaKey => [
                    'filename' => $file->getClientOriginalName(),
                    'filepath' => $s3FilePath
                ]]);
                continue;
            }
            foreach ($request->$fieldName as $file) 
            {
                if (!$file) 
                {
                    continue;
                }
                if ($dr_dir) {
                    $s3FilePath = $s3DirPath . $file->getClientOriginalName();

                    // check and remove folder and file on amazon server
                    Flysystem::has($s3FilePath) ? Flysystem::delete($s3FilePath) : '';
                    $files = $site->getMeta($metaKey) ? $site->getMeta($metaKey) : [];

                    // put uploaded file on amazon server
                    Flysystem::put($s3FilePath, fopen($file->getRealPath(), "r"));

                    // set amazon path on site meta
                    $site->setMeta([ $metaKey => array_merge($files, [
                        $file->getClientOriginalName() => $s3FilePath
                    ])]);
                    continue;
                }
                $fileName   = $file->getClientOriginalName();
                $fileArray  = explode('.', $fileName);
                $s3FilePath = $id ."/data-room/" . md5(uniqid(rand(), true)) . '.' . end($fileArray);
                // check and remove folder and file on amazon server
                $files  = $site->getMeta($dr_id) ? $site->getMeta($dr_id) : [];
                $filePath = !empty($files[$fileName]) ? $files[$fileName]['filePath'] : '';
                $filePath && Flysystem::has($filePath) ? Flysystem::delete($filePath) : '';

                // put uploaded file on amazon server
                Flysystem::put($s3FilePath, fopen($file->getRealPath(), "r"), [
                    'Metadata' => [
                        'name' => $fileName,
                        'key'  => $dr_id
                    ],
                ]);

                // set amazon path on site meta
                $timestamp = $userTimestamp = time();
                $user = Auth::user();
                $siteVisitTimestamps = $user->getMeta('last_site_visit_timestamp');
                $siteVisitTimestamps[$request->id] = $timestamp;
                $user->setMeta(['last_site_visit_timestamp' => $siteVisitTimestamps]);
                $user->save();
                $site->setMeta([$dr_id => array_merge($files, [
                    $fileName => [
                        'filePath'  => $s3FilePath,
                        'timeStamp' => time()
                    ]
                ])]);
                
            }
        }
        
        $site->save();
    }
    
    /**
     * Function to fetch the utility schedules of selected utility provider
     * 
     * @param Request $request
     * @return type
     */
    public function getUtilitySchedule(Request $request) 
    {
        $result = (new GreenButtonHelper())->getUtilityScheduleByUtilityProvider($request->utility_name);
        if ($result['error']) {
            return $result;
        }
        
        return response()->json($result['data']);
    }
    
    /**
     * Get the green button data after proccessing
     * 
     * @param type $id
     */
    public function getGreenButton($id)
    {
        $site = Site::find($id);
        if (!$site) {
            return back();
        }
        $greenButton = $site->getMeta('facility_information_file_green_button');
        if (count($greenButton) && !empty($greenButton['filename'])) {
            echo '<pre>';
            print_r((new GreenButtonHelper())->getGreenButtonData($id,$greenButton['filepath']));
            exit;
        }
    }
    
    public function assetRequest(Request $request, $id) 
    {
        $site = Site::find($id);
        $site->setMeta('active_tab', $request->get('project_active_tab'));
        $site->save();
        $this->validate($request, [
            'manufacturer_name' => 'required|min:2',
            'model_name'        => 'required|min:2'
        ]);
        $user = Auth::user();
        $data = [
            'user' => $user,
            'project_title' => $site->name,
            'project_id' => $site->id,
            'manufacturer_name' => $request->get('manufacturer_name'),
            'model_name' => $request->get('model_name'),
            'asset' => $request->get('asset'),
        ];
        $subject = 'New Asset Request';
        Mail::send('emails.project-asset', $data, function ($m) use ($user, $subject) {
            $m->from($user->email);
            $m->to(env('SUPPORT_EMAIL'), 'Wiser Capital')->subject($subject);

        });
        
        Maillog::create([
            'user_id' => $user->id,
            'route'   => \Request::route()->getName(),
            'email'   => $user->email,
            'subject' => $subject,
            'message' => $subject . ' of ' . $request->get('asset'),
        ]);
        Flash::success(trans('hf/general.success-message.request-review'));
        return redirect()->route('hf.edit', $site->id);
    }
}
