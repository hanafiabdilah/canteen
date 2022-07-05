<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request){
        if($request->sort == 'asc'){
            $products = Product::orderBy('name', 'ASC')->get();
        }else if($request->sort == 'desc'){
            $products = Product::orderBy('name', 'DESC')->get();
        }else{
            $products = Product::orderBy('created_at', 'DESC')->get();
        }
        return view('pages.products', compact('products'));
    }

    public function create(){
        return view('pages.create');
    }

    public function store(Request $request){
        $file = $request->file('image');
        $fileName = 'product_' . time() . '.' . $file->extension();
        $file->move(public_path('assets/img/products'), $fileName);

        Product::create([
            'name' => $request->name,
            'image' => $fileName,
            'description' => $request->description,
            'price' => $request->price,
            'student_id' => Auth::user()->id,
        ]);

        return back()->with('success', 'Selamat, product anda berhasil dibuat. Tunggu hingga product anda terjual');
    }
}
