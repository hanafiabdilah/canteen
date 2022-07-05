<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('product.index');
        }
        return view('auth.login');
    }

    public function post(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        Auth::attempt($credentials);

        return redirect()->route('product.index');
    }

    public function register(){
        return view('auth.register');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
