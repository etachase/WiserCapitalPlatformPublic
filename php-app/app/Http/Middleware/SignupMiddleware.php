<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Company;
use App\Support\Dropdown;
use Illuminate\Http\Response;
use Cookie;
use Request;

class SignupMiddleware
{

    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $roles = [];
        if($user) {
            $roles = $user->getRolesList();

            $is_complete_profile = $user->is_complete_profile;
            $session             = \Session::get('skip_business_profile');

            if ($is_complete_profile || $session || Request::is('business-profile/*') 
                    || Request::is('profile/*') || Request::is('auth/logout')) {
                return $next($request);
            } 
            
            if(!$is_complete_profile && in_array(\App\Models\Role::TYPE_SOLAR_INTEGRATOR,$roles)){
                $url = '/business-profile/edit';
                return redirect($url);
            }
        }
        return $next($request);
        
    }
}
