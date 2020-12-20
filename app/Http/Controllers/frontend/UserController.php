<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signin_form(){
        $all_categories = Category::all();
        return view('frontend.signin',compact('all_categories'));
    }
    public function signup_form(){
        $all_categories = Category::all();
        return view('frontend.signup',compact('all_categories'));
    }
    public function sign_up(){
        $this->validate(request(), [
            'fullname' => 'required|min:5|max:50',
            'email' => 'required|email|unique:users',            
            'password' => 'required|confirmed|min:5|max:15'
        ]);
        
        $user = User::create([
            'fullname' => request('fullname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'activation_key' => Str::random(60),
            'is_active' => 0
        ]);
        
        auth()->login($user);
        return redirect()->route('home');
    }
}
