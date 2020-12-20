<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($name){
        $all_categories = Category::all();
        $product = Product::whereSlug($name)->firstOrFail();
        $categories = $product->categories()->distinct()->get();
        return view('frontend.product-detail',compact('product','categories','all_categories'));
    }

    public function search(){
        $all_categories = Category::all();
        $seacrhing_value = request('searching_value');
        $products = Product::where('product_name', 'like', "%$seacrhing_value%")
                    ->orWhere('description', 'like', "%$seacrhing_value%")
                    ->get();
        //Bu isteğe ait aranan bilgisini oturum içerisinde saklamış oluyor
        request()->flash();
        return view('frontend.searching', compact('products','all_categories'));
    }
}
