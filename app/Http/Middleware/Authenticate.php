<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if($request->is('admin/*')){
            if( !Auth::guard('admin')->check() ){
                return route('admin.login');
            }
        } 
        elseif($request->is('merchant/*')){
            if( !Auth::guard('merchant')->check() ){
                return route('merchant.login');
            }
        } 
        elseif($request->is('officer/*')){
            if( !Auth::guard('officer')->check() ){
                return route('officer.login');
            }
        } 
        elseif($request->is('user/*')){
            if( !Auth::guard('visitor')->check() ){
                return route('visitor.login');
            }
        } 
        elseif( !Auth::guard('web')->check() ){
            return redirect()->route('root');
        }else{
            return redirect()->route('root');
        }
    }
}
