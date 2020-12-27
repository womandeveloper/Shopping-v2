<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if(request()->isMethod('POST')){
            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = [
                'email'    => request()->get('email'),
                'password' => request()->get('password'),
                'is_admin' => 1
            ];
            if(Auth::guard('admin')->attempt($credentials, request()->has('remember_me'))){
                return redirect()->route('admin.home');
            }else{
                //back ile tekrar forma geri dön email değeri ile geri dön 
                return back()->withInput()->withErrors(['email' => 'Giriş Hatalı']);
            }
        }
        return view('backend.login');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();

        return redirect()->route('admin.login');
    }
}
