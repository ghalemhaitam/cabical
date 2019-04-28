<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::guard($guard)->check()) {


            if($request->user()->roles()->where('name','Admin')->first()){
                return redirect('/Docteur');
            }
            if($request->user()->roles()->where('name','Secretary')->first()){
                return redirect('/Secretaire');
            }
        }

        return $next($request);
    }
}
