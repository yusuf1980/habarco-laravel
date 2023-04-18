<?php

namespace App\Http\Middleware;

use Closure;
use App\Setting;

class MaintenanceMiddleware
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
        $set = Setting::where('key', 'maintenance')->first();
        if($set->value == 1){
            return response()->view('errors.maintenance');
        }

        return $next($request);
    }
}
