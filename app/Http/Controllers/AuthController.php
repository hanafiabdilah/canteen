<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function unique_id(){
        $student = Student::latest();
        if($student->count() > 0){
            $last_id =  substr($student->first()->user_id, 0, 3);
        }else{
            $last_id = '000';
        }

        $new_id = (int)$last_id + 1;
        $new_id = sprintf("%03d", $new_id);
        $sum = 0;

        for($i = 0; $i < 3; $i++){
            $sum = $sum + (int)$new_id[$i];
        }

        $user_id = sprintf("%03d", $new_id) . sprintf("%02d", $sum);

        return $user_id;
    }

    public function login(){
        if(Auth::check()){
            return redirect()->route('product.index');
        }
        return view('auth.login');
    }

    public function post(Request $request){
        $credentials = [
            'user_id' => $request->user_id,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('product.index');
        }
        return back()->with('error', 'User ID atau Password salah');
    }

    public function register(){
        if(Auth::check()){
            return redirect()->route('product.index');
        }
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $check_email = Student::where('email', $request->email)->first();
        if($check_email){
            return back()->with('error', 'Email sudah digunakan');
        }
        
        $user_id = $this->unique_id();

        $student = Student::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = [
            'user_id' => $student->user_id,
            'password' => $request->password,
        ];

        Auth::attempt($credentials);
        
        return redirect()->route('profile.index')->with('success', 'Selamat, akun anda sudah bisa digunakan! Setelah keluar, Login menggunakan User ID dan Password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('product.index');
    }
}
