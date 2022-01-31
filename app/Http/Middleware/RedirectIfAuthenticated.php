<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        if($request->is('admin/*')){
            if( Auth::guard('admin')->check() ){
                return redirect()->route('admin.home');
            }
        }
        elseif($request->is('merchant/*')){
            if( Auth::guard('merchant')->check() ){
                return redirect()->route('merchant.home');
            }
        }
        elseif($request->is('officer/*')){
            if( Auth::guard('officer')->check() ){
                return redirect()->route('officer.home');
            }
        }
        elseif($request->is('user/*')){
            if( Auth::guard('visitor')->check() ){
                return redirect()->route('visitor.home');
            }
        }
        elseif ( Auth::guard($guard)->check() ) {
            return redirect()->route('root');
        }

        return $next($request);
    }
}
