<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $all_categories = Category::all();
        return view('frontend.order',compact('all_categories'));
    }
}
