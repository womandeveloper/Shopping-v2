<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($name){
        $category = Category::where('slug', $name)->firstOrFail();
        $childcategories = Category::where('parent_id',$category->id)->get();
        //dd($childcategories);
        //$products = $category->products;
        return view('frontend.category',compact('category','childcategories'));
    }
}