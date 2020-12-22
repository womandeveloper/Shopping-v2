<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index(){
        $all_categories = Category::all();
        return view('frontend.shopping-card',compact('all_categories'));
    }
    public function add(){
        $product = Product::find(request('id'));
        Cart::add($product->id, $product->product_name, 1 , $product->price, 0, ['slug' => $product->slug]);
        return redirect()->route('shopping_cart')
            ->with('message', 'Ürün Sepete Eklendi')
            ->with('message_type', 'success');
    }
}
