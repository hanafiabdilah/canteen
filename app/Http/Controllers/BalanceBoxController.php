<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSold;
use App\Models\Student;
use App\Models\WithdrawHistory;
use Illuminate\Http\Request;

class BalanceBoxController extends Controller
{
    public function index(){
        $students = Student::orderBy('saldo', 'DESC')->get();
        
        $total_saldo = Product::where('sold', true)->sum('price');
        $saldo = $students->sum('saldo');
        $saldo_ditarik = $total_saldo - $saldo;
        $withdraw_history = WithdrawHistory::orderBy('created_at', 'DESC')->get();

        return view('pages.balancebox', compact('students', 'total_saldo', 'saldo', 'saldo_ditarik', 'withdraw_history'));
    }
}
