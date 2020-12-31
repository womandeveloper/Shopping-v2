<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(){

        $bestseller = DB::select("
            SELECT product.product_name, SUM(cart_products.piece) piece
            FROM orders 
            INNER JOIN carts as c ON c.id = or.cart_id
            INNER JOIN cart_products as cp ON c.id = cp.sepet_id
            INNER JOIN product as p ON p.id = cp.product_id
            GROUP BY p.product_name
            ORDER BY SUM(cart_products.piece) DESC
        ");
        print_r($bestseller);exit;
        return view('backend.index');
        
        // $end_time = now()->addMinutes(10);

        // $statistics = Cache::remember('statistics', $end_time, function(){
        //     return [
        //         'waiting_order' => Order::where('status','Siparişiniz alındı')->count()
        //     ];
        // });
        // return view('backend.index', compact('statistics'));

        // $cache_durum = "db";
        // if(!Cache::has('statistics')){
        //     $statistics = [
        //         'waiting_order' => Order::where('status','Siparişiniz alındı')->count(),
        //     ];
        //     $end_time = now()->addMinutes(10);
        //     Cache::put('statistics', $statistics, $end_time);
        //     //Cache::add('statistics', $statistics, $end_time);
        // }else{
        //     $statistics = Cache::get('statistics');
        //     $cache_durum = "cache";
        // }
        // //Cache temizleme
        // Cache::forget('statistics');
        // Cache::flush();
        // php artisan cache:clear
        // Cache alanında varsa cache'ten yoksa veritabanından çek
        // Cache::remember('statistics', $end_time, function(){});
    }
}
