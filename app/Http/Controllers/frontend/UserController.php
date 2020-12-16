<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sign_in(){
        return view('frontend.signin');
    }
    public function sign_up(){
        return view('frontend.signup');
    }
}
