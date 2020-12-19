<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $all_categories = Category::all();
        return view('frontend.payment',compact('all_categories'));
    }
}
