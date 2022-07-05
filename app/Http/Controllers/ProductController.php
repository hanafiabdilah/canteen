<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::where('sold', false);

        if($request->sort == 'asc'){
            $products = $products->orderBy('name', 'ASC')->get();
        }else if($request->sort == 'desc'){
            $products = $products->orderBy('name', 'DESC')->get();
        }else{
            $products = $products->orderBy('created_at', 'DESC')->get();
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

    public function buy($id){
        $product = Product::findOrFail($id);
        $seller = $product->seller;

        if($product->student_id == Auth::user()->id){
            return back()->with('error', 'Pembelian gagal, Anda tidak dapat membeli produk anda sendiri');
        }

        ProductSold::create([
            'product_id' => $product->id,
            'buyer_id' => Auth::user()->id,
        ]);

        $seller->update([
            'saldo' => $seller->saldo + $product->price,
        ]);

        $product->update([
            'sold' => true,
        ]);

        return back()->with('success', 'Selamat, Produk berhasil dibeli');
    }

    public function sold(){
        $products = Product::where('sold', true)->orderBy('updated_at', 'DESC')->get();
        return view('pages.product_sold', compact('products'));
    }
}
