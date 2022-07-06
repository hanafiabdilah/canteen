<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalanceBoxController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'post'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/buy/{id}', [ProductController::class, 'buy'])->name('product.buy');
    Route::get('/product/my', [ProductController::class, 'my'])->name('product.my');

    Route::get('/balance-box', [BalanceBoxController::class, 'index'])->name('balance.box.index');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/purchase', [ProfileController::class, 'purchase'])->name('profile.purchase');
    Route::get('/profile/sale', [ProfileController::class, 'sale'])->name('profile.sale');
    Route::post('/profile/withdraw', [ProfileController::class, 'withdraw'])->name('profile.withdraw');
});
