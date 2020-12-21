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
    Route::get('/shopping-cart',[CartController::class,'index'])->name('shopping_cart');

    Route::group(['middleware'=>'auth'], function(){
        Route::get('/payment',[PaymentController::class,'index'])->name('payment');
        Route::get('/orders',[OrderController::class,'index'])->name('orders');
        Route::get('/orders/{id}',[OrderController::class,'index'])->name('order');
    });
    
    Route::group(['prefix'=>'user'], function(){
        Route::get('/sign-in',[UserController::class, 'signin_form'])->name('login');
        Route::post('/sign-in',[UserController::class, 'login']);
        Route::get('/sign-up',[UserController::class, 'signup_form'])->name('sign_up');
        Route::post('/sign-up',[UserController::class, 'sign_up']);
        Route::post('/checkout',[UserController::class, 'checkout'])->name('checkout');
        Route::get('/activate/{key}',[UserController::class, 'activate'])->name('activate');
    });
});

Route::get('send-mail', function () { 
    $user = \App\Models\User::find(1);
    return new App\Mail\SendMail($user);
});