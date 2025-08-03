<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Site;
use Auth;
use App\Models\Company;
use Request;
use App\Models\ProjectUser;

class HFMiddleware
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
        $company_id = Auth::user()->company_id;
        $allowedSites = [];
        
        if ($company_id && Company::isShared($company_id)) {
            $allowedSites = Company::find($company_id)->sites()->lists('sites.id')->toArray();
        }
        
        //check if this a hf route
        $site_id = empty($request->route()->parameter('hf')) ? $request->route()->parameter('id') : $request->route()->parameter('hf');
        
        $allowed = false;
        
        //admins and owners should be allowed
        if (Auth::user()->hasRole('admins') || (isset($site_id) && 
            is_numeric($site_id) && Site::where('user_id', Auth::id())->where('id',$site_id)->first())
                
                ) {
            $allowed = true;
        }
        
        if (ProjectUser::where('user_id', Auth::id())->where('site_id',$site_id)->first()) {
            $allowed = true;
        }
        
        //company shared projects should be allowed
        if (!$allowed && !empty($allowedSites) && in_array($site_id, $allowedSites)) {
            $allowed = true;
        }
        
        if (!$allowed) {
            abort(404);
        }
        return $next($request);
        
    }
}
