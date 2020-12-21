<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Mail\SendMail;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('checkout');
    }
    public function signin_form(){
        $all_categories = Category::all();
        return view('frontend.signin',compact('all_categories'));
    }
    public function login(){
        $this->validate(request(),[
            'email' => 'required|email',            
            'password' => 'required'
        ]);
        if(auth()->attempt(['email'=>request('email'),'password'=>request('password')],request()->has('remember_me'))){
            request()->session()->regenerate();
            return redirect()->intended('/');
        }else{
            $errors = ['email' => 'Hatalı Giriş'];
            return back()->withErrors($errors);
        }
    }
    public function signup_form(){
        $all_categories = Category::all();
        return view('frontend.signup',compact('all_categories'));
    }
    public function sign_up(){
        $this->validate(request(), [
            'fullname' => 'required|min:5|max:50',
            'email' => 'required|email|unique:users',            
            'password' => 'required|confirmed|max:15'
        ]);
        
        $user = User::create([
            'fullname' => request('fullname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'activation_key' => Str::random(60),
            'is_active' => 0
        ]);

        Mail::to(request('email'))->send(new SendMail($user));
        
        auth()->login($user);
        return redirect()->route('home');
    }
    public function activate($key){
        $all_categories = Category::all();
        $user = User::where('activation_key', $key)->first();
        if (!is_null($user)) {
            $user->activation_key = null;
            $user->is_active = 1;
            $user->save();

            return redirect()->to('/')
                ->with('message', 'Kullanıcı kaydınız aktifleştirildi')
                ->with('message_type', 'success')
                ->with('all_categories',$all_categories);
        } else {
            return redirect()->to('/')
                ->with('message', 'Kullanıcı kaydınız aktifleştirilemedi')
                ->with('message_type', 'warning')
                ->with('all_categories',$all_categories);
        }
    }
    public function checkout(){
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('home');
    }
}
