<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('kukaradmin/login');
            }
        }

        $next_request = $next($request);

        if($request->user()->suspended) {
            // logout user
            Auth::logout();

            // redirect to login page
            return redirect()->guest('kukaradmin/login')
                ->withErrors(['email' => 'Akun ini telah di suspend',]);
        }

        return $next_request;
    }
}
