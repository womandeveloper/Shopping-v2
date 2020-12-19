<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\PaymentController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\CategoryController;

Route::group(['namespace' => 'frontend'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/category/{slug_categoryname}',[CategoryController::class, 'index'])->name('category');
    Route::get('product/{slug_product_name}',[ProductController::class, 'index'])->name('product');    
    Route::get('/product_search',[ProductController::class,'search'])->name('product_search');
    Route::post('/product_search',[ProductController::class,'search'])->name('product_search');
    Route::get('/shopping-card',[CartController::class,'index'])->name('shopping_cart');
    Route::get('/payment',[PaymentController::class,'index'])->name('payment');
    Route::get('/order',[OrderController::class,'index'])->name('order');
    Route::get('/sign-in',[UserController::class, 'sign_in'])->name('sign_in');
    Route::get('/sign-up',[UserController::class, 'sign_up'])->name('sign_up');
});
