<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::whereRaw('parent_id is null')->take(5)->get();
        return view('frontend.index',compact('categories'));
    }
}

