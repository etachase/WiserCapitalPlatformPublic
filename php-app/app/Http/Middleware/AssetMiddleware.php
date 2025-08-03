<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Asset;

class AssetMiddleware
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
        if ( isset($request->type) && !array_search($request->type,Asset::$type_mappings_view)) {
            abort(404);
        }
        return $next($request);
    }
}
