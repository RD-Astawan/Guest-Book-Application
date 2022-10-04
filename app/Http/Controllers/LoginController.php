<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\PPID;
use App\Models\KSPP;

class LoginController extends Controller
{
   
    public function login(Request $request){
        if(Auth::guard('kspp')->attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect('/kspp_dashboard');
        }
        elseif(Auth::guard('ppid')->attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect('/ppid_dashboard');
        }
        return redirect('/login');
    }

    public function logout(){
        if(Auth::guard('kspp')->check()){
            Auth::guard('kspp')->logout();
        }
        elseif(Auth::guard('ppid')->check()){
            Auth::guard('ppid')->logout();
        }
        return redirect('/login');
    }
}
