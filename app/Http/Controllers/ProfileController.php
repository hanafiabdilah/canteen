<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('pages.profile');
    }

    public function withdraw(Request $request){
        $student = Auth::user();
        if($request->jumlah > $student->saldo){
            return back()->with('error', 'Gagal menarik saldo, saldo anda kurang');
        }

        $student->update([
            'saldo' => $student->saldo - $request->jumlah,
        ]);
        return back()->with('success', 'Saldo berhasil ditarik dan sudah di transfer ke rekening anda');
    }
}
