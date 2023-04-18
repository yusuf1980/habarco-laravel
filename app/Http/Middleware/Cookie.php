<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Cookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {}
        elseif($request->user()->can('author')) {
            if(!isset($_COOKIE['samweb'])){
                $random = str_random(30);
                setcookie('samweb', $random, time()+7200, '/');
            }
        }else {
            if(isset($_COOKIE['samweb'])){
                setcookie('samweb', '', time() - 3600, '/');
            }
        }

        return $next($request);
    }
}
