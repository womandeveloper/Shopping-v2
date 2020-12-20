<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(){
        $all_categories = Category::all();
        return view('frontend.payment',compact('all_categories'));
    }
}
