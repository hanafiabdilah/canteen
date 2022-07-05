<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        return view('pages.products');
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

        return back()->with('success', 'Product Created');
    }
}
