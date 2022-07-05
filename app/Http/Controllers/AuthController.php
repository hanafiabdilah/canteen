<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if(Auth::attempt($credentials)){
            return redirect()->route('product.index');
        }
        return back()->with('error', 'Email atau Password salah');
    }

    public function register(){
        if(Auth::check()){
            return redirect()->route('product.index');
        }
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $students = Student::where('email', $request->email)->first();
        if($students){
            return back()->with('error', 'Email sudah digunakan');
        } 

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success', 'Selamat, akun anda sudah bisa digunakan! Silahkan Login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
