<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['cart_id', 'order_price', 'status', 'bank', 'installment'];
    protected $guarded = [];

    public function cart(){
        return $this->belongTo('App\Models\ShoppingCart');
    }
}
