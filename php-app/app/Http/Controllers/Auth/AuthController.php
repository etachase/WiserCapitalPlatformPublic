<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Session;
use Auth;
use Flash;

use App\Support\Dropdown;
use App\Repositories\AuditRepository as Audit;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'username' => 'min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'role'   => $this->roleValidations(),
            'remember' => 'required'
        ]);
    }
    
    /**
     * Get Validations for the role field
     * @return string
     */
    protected function roleValidations() {
        $validation_string = 'required|';
        $possible_values = implode(',', array_keys(Dropdown::$user_roles));
        return $validation_string . 'in:' . $possible_values;
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => isset($data['username']) ? $data['username'] : $data['email'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        //validation already forces role so existence check
        $user->forceRole($data['role']);

        return $user;
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {

	
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        \Session::flush();
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember')) ) {
			
			
 $user = Auth::user();
            // Allow only if user is root or enabled.
            if ( ('root' == $user->username) || ($user->enabled) )
            {
                Audit::log(Auth::user()->id, trans('general.audit-log.category-login'), trans('general.audit-log.msg-login-success', ['email' => $user->email]));

                Flash::success("Welcome " . Auth::user()->first_name);
                return redirect()->intended($this->redirectPath());
            }
            else
            {
                Audit::log(null, trans('general.audit-log.category-login'), trans('general.audit-log.msg-forcing-logout', ['email' => $credentials['email']]));

                Auth::logout();
                return redirect(route('login'))
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => trans('admin/users/general.error.login-failed-user-disabled'),
                    ]);
            }
        }

        Audit::log(null, trans('general.audit-log.category-login'), trans('general.audit-log.msg-login-failed', ['email' => $credentials['email']]));

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        $page_title = "Login";

        return view('auth.login', compact('page_title'));
    }
    /**
     * Get terms & condition data.
     *
     * @return Response
     */
    public function getTerms(Request $request)
    {
        $role = strtolower(str_replace(' ', '-', $request->value));

        return view('auth.terms.'.$role);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register', [
            'page_title' => 'Register', 
            'roles'=> Dropdown::$user_roles,
            ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        Audit::log(null, trans('general.audit-log.category-register'), trans('general.audit-log.msg-registration-attempt', ['email' => $request['email']]));

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        if (config('auth.enable_user_on_create')) {
            $user->enabled = true;
            $user->save();
            
            Audit::log(null, trans('general.audit-log.category-login'), trans('general.audit-log.msg-account-created-login-in', ['email' => $user->email]));
            //Flash::success("Welcome " . $user->first_name . ", please complete your profile. You can skip and to this later.");

            Auth::login($user);

            //return redirect('/business-profile/edit');
            return redirect(route('home'));
        }
        else {
            Audit::log(null, trans('general.audit-log.category-login'), trans('general.audit-log.msg-account-created-disabled', ['email' => $user->email]));
            Flash::success("Welcome " . $user->first_name . ", your account has been created, and will soon be enabled.");

            return redirect(route('home'));
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout(Request $request)
    {
        Auth::logout();
        if($request->ajax()){
            Session::flash('session-out-alert', trans('general.error.session-timeout')); 
            return response()->json(['success' => true]);
        }
        
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

}
