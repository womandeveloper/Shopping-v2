<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $waiting_order = Order::where('status','Siparişiniz alındı')->count();
        return view('backend.index', compact('waiting_order'));
    }
}
