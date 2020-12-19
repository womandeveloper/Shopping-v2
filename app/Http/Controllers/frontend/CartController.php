<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $all_categories = Category::all();
        return view('frontend.shopping-card',compact('all_categories'));
    }
}
