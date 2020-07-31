<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function post_login(Request $request){
        
        if(!\Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->back()->with('msg', '<b>Login gagal</b>.</br>Masukan username dan password yang benar!');
        }
        return redirect()->intended('admin');
    }

    public function logout(){

        \Auth::logout();
        return redirect()->to('/admin');
    }
}