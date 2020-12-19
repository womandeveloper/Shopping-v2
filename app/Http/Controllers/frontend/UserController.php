<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sign_in(){
        $all_categories = Category::all();
        return view('frontend.signin',compact('all_categories'));
    }
    public function sign_up(){
        return view('frontend.signup');
    }
}
