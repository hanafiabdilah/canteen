<?php

namespace App\Http\Controllers;

use App\Models\ProductSold;
use App\Models\Student;
use Illuminate\Http\Request;

class BalanceBoxController extends Controller
{
    public function index(){
        $total_saldo = 0;
        $saldo = 0;
        $products = ProductSold::orderBy('created_at', 'DESC')->get();
        $students = Student::orderBy('saldo', 'DESC')->get();

        foreach($products as $product){
            $total_saldo = $total_saldo + $product->detail->price;
        }

        foreach($students as $student){
            $saldo = $saldo + $student->saldo;
        }

        $saldo_ditarik = $total_saldo - $saldo;

        return view('pages.balancebox', compact('products', 'students', 'total_saldo', 'saldo', 'saldo_ditarik'));
    }
}
