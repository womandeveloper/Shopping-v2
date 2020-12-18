<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($name){
        $product = Product::whereSlug($name)->firstOrFail();
        $categories = $product->categories()->distinct()->get();
        return view('frontend.product-detail',compact('product','categories'));
    }
}
