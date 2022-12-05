<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login(){
        return view('authentication/login');
    }
    function login_process(Request $request){
        if(($request->username=="Xunqi")&&($request->password=="L1485")){
            $request->session()->put('LoggedUser',"Xunqi");
            return redirect('album');
        }
        return back()->with('fail',"Email atau Password Salah");
    }
    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
}
