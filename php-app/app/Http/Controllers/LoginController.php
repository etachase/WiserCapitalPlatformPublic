<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Session\Store;

class LoginController extends Controller
{
    protected $timeout;
    protected $session;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
        $this->timeout = env('SESSION_TIMEOUT', 1800);
    }
    
    public function checkLoginStatus () 
    {        
        $this->middleware('auth');
        $timeout = $this->session->get('userTimeout');
        $logoutTime = $this->timeout - (time() - $timeout);
        if ($logoutTime <= 0) {
            \Session::flash('session-out-alert', trans('general.error.session-timeout')); 
            $this->session->forget('userTimeout');
            \Auth::logout();
        }
        return \Response::json(array('success' => true, 'time' => $logoutTime, 
                'newToken' => ($logoutTime > 120) ? csrf_token() : ''), 200, array());
    }
    public function getToken () 
    {        
        return csrf_token();
    }
}
