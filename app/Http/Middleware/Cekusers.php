<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class Cekusers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   
        public function handle($request, Closure $next, $guard=null){
        if(Auth::guard($guard)->check()) {

            if($guard == "ppid"){
                //user was authenticated with admin guard.
                return redirect()->route('beranda_ppid');
            } 
            elseif($guard == "kspp"){
                return redirect()->route('beranda_kspp');
            }
            else {
                //default guard.
                return redirect()->route('login');
            }
    
        }
        return redirect()->route('login');
    }
  
}
