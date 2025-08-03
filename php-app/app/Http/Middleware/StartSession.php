<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;

class StartSession {

    protected $session;
    protected $timeout;

    public function __construct(Store $session){
        $this->timeout = env('SESSION_TIMEOUT', 1800);
        $this->session = $session;
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = substr(str_replace(url(), '', $request->url()), 1, 9);
        if ($request->get('checkLoginStatus') || ($url == '_debugbar')) {
            return $next($request);
        }
        
        $isLoggedIn = $request->path() != 'login';
        if(! $this->session->get('userTimeout') && $isLoggedIn) {
            $this->session->set('userTimeout', time());
        } else if(($timeout = $this->timeout - (time() - $this->session->get('userTimeout'))) <= 0 && $isLoggedIn){
            \Session::flash('session-out-alert', trans('general.error.session-timeout')); 
            $this->session->forget('userTimeout');
            \Auth::logout();
        }
        $isLoggedIn ? $this->session->put('userTimeout', time()) : $this->session->forget('userTimeout');
        
        return $next($request);
    }

}