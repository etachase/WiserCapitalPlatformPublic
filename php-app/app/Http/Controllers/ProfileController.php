<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Company;
use DougSisk\CountryState\CountryState;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Support\Dropdown;
use App\Models\SolarInstaller;
use \App\Models\Role;
use JmesPath\Env;
use URL;
use Auth;
use Flash;
use Flysystem;
use App\Support\WSAR;
use Mail;
use App\Models\Maillog;
use DB; 
use App\Repositories\AuditRepository as Audit;

class ProfileController extends Controller
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
        if (!Auth::user()->hasRole('solar-installer')) {
            Flash::error('You are not authorized to access this module');
            return back();
        }
        
        $user = Auth::user();
        $solar_installer_id = $user->getMeta('solar_installer_id');
        $solar_installer = SolarInstaller::find($solar_installer_id);
        $solar_installer_meta = $solar_installer ? $solar_installer->getMeta() : [];
        if ($solar_installer) {
            $solar_installer->meta = $solar_installer_meta;
        }

        if(!empty($solar_installer_meta['profile_photo'])){
            $profile_photo = asset('files/profile-pics') . '/' . $solar_installer->meta['profile_photo'];
           // $profile_photo = "profile-pics/".$solar_installer->meta['profile_photo'];
        }else{
            $profile_photo = 'assets/themes/wisercapital/img/wc-watermark.gif';
        }

        $page_title       = 'MY PROFILE';
        $page_description = '';
        
        return view('profile.index', compact('user','solar_installer','profile_photo', 'page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $requestdata = $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solar_installer       = SolarInstaller::find($id);
        
        if (!$solar_installer) {
            Flash::error('Solar Installer doesn\'t exist');
            return back();
        }
        
        $solar_installer->meta = $solar_installer->getMeta();
        $user_meta             = DB::table('users_meta')->where('key', 'solar_installer_id')
                                    ->where('value', $id)->first();
        
        $user = $user_meta ? User::find($user_meta->id) : '';
        if(!empty($solar_installer->meta['profile_photo'])){
            $profile_photo = asset('files/profile-pics') . '/' . $solar_installer->meta['profile_photo'];
           // $profile_photo = "profile-pics/".$solar_installer->meta['profile_photo'];
        }else{
            $profile_photo = 'assets/themes/wisercapital/img/wc-watermark.gif';
        }

        $page_title       = 'MY PROFILE';
        $page_description = '';
        
        return view('profile.index', compact('user','solar_installer','profile_photo', 'page_title', 'page_description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        
        //view is created according to the role name
        $user_role_name = $user->getAppRoleName();
        $is_admin       = Auth::user()->hasRole('admins');
        
        if ($user_role_name || $is_admin) {
            $page_title       = "Profile Details";
            $page_description = "";
            
            return view('profile.edit', compact('page_title','page_description','user'));
        }
        abort(404);
    }
    
    /**
     * Return profile data according to the role of the user.
     * @return array
     */
    private function getProfileInfo() {
        $profile_info = [];
        $user = Auth::user();
        
        if ($user->getAppRoleName() == Role::TYPE_SOLAR_INTEGRATOR) {
            $siId = $user->getMeta('solar_installer_id');
            if (!empty($siId)) {
                $solar_installer = SolarInstaller::find($siId);
                $s3Helper = app('s3helper');
                $profile_info = [
                    'solar_installer' => $solar_installer, 
                    'solar_installer_meta' => $solar_installer->getMeta(),
                    'uploaded_files' => $s3Helper->getAllUploadedFiles($solar_installer->getMeta(), 'profile.solar_file_fields')
                ];
            }
        } else if ($user->getAppRoleName() == Role::TYPE_INVESTOR) {
          $profile_info['investor_meta']  = $user->getMeta();
        } 
        
        return $profile_info;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $this->validate($request, [
            'current_password' => 'sometimes|required_with:password',
            'password'         => 'sometimes|confirmed',
            'first_name'       => 'sometimes|required',
            'last_name'        => 'sometimes|required',
        ]);
        $user = Auth::user();
        $attributes = $request->all();

        if($attributes['password'] != '' && !\Hash::check($attributes['current_password'],$user->password)){
            return back()->with('status','Current password is invalid');
        }

        $user->first_name = $attributes['first_name'];
        $user->last_name = $attributes['last_name'];
        if($attributes['password']){
            $user->password = $attributes['password'];
        }
        $is_debug = ($request->is_debug)? 1:0;
        $user->is_debug = $is_debug;
        $user->save();
        Audit::log(Auth::id(), ucfirst(SolarInstaller::SOLAR_INSTALLER), 'Update Solar Installer Profile : '.
            $user->name);

        Flash::success('Profile Updated Successfully');
        $url = URL::route('welcome');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for editing the business profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function businessEdit()
    {
        $user    = Auth::user();
        
        //view is created according to the role name
        $user_role_name = $user->getAppRoleName();
        
        $country  = new CountryState();
        $states   = $country->getStates('US');
        $is_admin = Auth::user()->hasRole('admins');
        
        if ($user_role_name || $is_admin) {
            $user_role_name   = strtolower(str_replace(' ', '-', $user_role_name));
            $page_title       = "Business Information";
            $page_description = "";
            $wsar_status      = Dropdown::$wsar_status;
            $yes_no           = Dropdown::$yes_no;
            $profile_info     = $this->getProfileInfo();
            
            return view('business-profile.edit', array_merge(compact('page_title',
                'page_description','is_admin', 'user_role_name', 'wsar_status','yes_no','states','user'), $profile_info));
        }
        abort(404);
    }
    /**
     * Update the business profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function businessUpdate(Request $request)
    {
        
        $this->validate($request, array_merge(array_merge([
            'solar_installer.name' => 'sometimes|required',
            'solar_installer.phone' => 'sometimes|required',
            'solar_installer.address' => 'sometimes|required',
            'solar_installer.zip_code' => 'sometimes|digits_between:4,10',
            'investor_meta.street' => 'sometimes|required',
            'investor_meta.phone' => 'sometimes|required',
            'investor_meta.zip_code' => 'sometimes|digits_between:4,10',
        ], config('constants.profile.solar_file_fields')), $this->solar_installer->validateMultiFiles($request)));
        $user = Auth::user();
        
        /* save solar installer data if it exists */
        if ($user->getAppRoleName() == Role::TYPE_SOLAR_INTEGRATOR) {
            if (!isset($request['solar_installer']) || empty($request['solar_installer']['name'])) {
                return back()->with('status','Company Name is required');   
            }
            $solarInstaller = SolarInstaller::where('name', $request['solar_installer']['name'])->first();
            if ($solarInstaller && $solarInstaller ->id != $user->getMeta('solar_installer_id')) {
                return back()->with('status','This company is already registered. Please contact support.');   
            } else if (!empty($user->getMeta('solar_installer_id'))) {
                $solarInstaller = SolarInstaller::find($user->getMeta('solar_installer_id'));
                $solarInstaller->update($request['solar_installer']);
            } else {
                $solarInstaller = SolarInstaller::create($request['solar_installer']);
            }
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
            Audit::log(Auth::id(), ucfirst(SolarInstaller::SOLAR_INSTALLER), 'Update Solar Installer Business Profile : '.
                $solarInstaller->name, ['id' => $solarInstaller->id,
                    'phone' => $solarInstaller->phone, 'website' => $solarInstaller->website]);
            $user->setMeta('solar_installer_id', $solarInstaller->id); 
        }

        /* save investor data if it exists */
        if (isset($request['investor_meta']) && !empty($request['investor_meta']['street']) 
            && $user->getAppRoleName() == Role::TYPE_INVESTOR) {
            foreach($request['investor_meta'] as $key => $value)
            {
                if (empty($value))
                {
                    $user->unsetMeta($key);
                }
            }
            
            $user->setMeta($request['investor_meta']);
            
        }
        $user->is_complete_profile = true;
        $user->save();
        
        Flash::success('Company Profile Updated Successfully');
        $url = URL::route('welcome');
        return redirect()->to($url);
    }

    public function uploadProfilephoto(Request $request){
        $user    = Auth::user();
        $solar_installer_id = $user->getMeta('solar_installer_id');
        $solarInstaller = SolarInstaller::find($solar_installer_id);
        if ($request->hasFile('change_photo')) {
            $mimetype = $request->file('change_photo')->getMimeType();
            if (strpos($mimetype, 'image/') === false) {
                return response()->json(['message' => trans('Please upload images only!'), 'success' => false]);
            }
            $DirPath = 'profile-pics/' ;
            $original_name = $request->file('change_photo')->getClientOriginalName();
            $returnData = explode('.',$original_name);
            $filename = $solar_installer_id.".".$returnData[1];
            $FilePath = $DirPath .$filename ;
            Flysystem::connection('public')->put($FilePath, fopen($request->file('change_photo')->getRealPath(), "r"));
            $path = asset('files/profile-pics') . '/' . $filename;

            $data = [
                'profile_photo' => $filename
            ];
            $solarInstaller->setMeta($data);
            $solarInstaller->save();
            return response()->json(['path' => $path,'message' => trans('Profile Photo Uploaded successully!'), 'success' => true]);
        }
    }

    public function contactWiser(Request $request){
        $user    = Auth::user();
        $message = $request->message;
        $subject = $request->subject;
        $name    = $user->first_name." ".$user->last_name;
        $email   = $request->email;
        
        if (!$message || !$subject || !$email) {
            return response()->json(['message' => trans('All fields are required!'), 'success' => false]);
        }
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
            return response()->json(['message' => trans('Please enter a valid email address!'), 'success' => false]);
        }
        $data = [
            'umessage' => $message,
            'uname' => $name
        ];
        Mail::send('emails.wiser', $data, function ($m) use ($subject) {
            $m->from(env('INFO_EMAIL'));
            $m->to(env('SUPPORT_EMAIL'), 'Wiser Capital')->subject($subject);
        });
        
        Maillog::create([
            'user_id' => $user->id,
            'route'   => \Request::route()->getName(),
            'email'   => $email,
            'subject' => $subject,
            'message' => $message,
        ]);
        return response()->json(['message' => trans('Message send successully!'), 'success' => true]);
    }
    
    /**
     * Function to skip the business profile page
     * 
     * @return type
     */
    public function skip() 
    {
        \Session::set('skip_business_profile', true);
        return redirect('/hf');
    }
}
