<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function halamanLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/');
        }
        Session::flash('error', 'Username atau password salah');
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
