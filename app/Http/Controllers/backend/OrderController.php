<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list(){
        return view('backend.order-list');
    }
    public function add(){
        return view('backend.order-add');
    }
    public function update(){
        return view('backend.order-update');
    }
}
