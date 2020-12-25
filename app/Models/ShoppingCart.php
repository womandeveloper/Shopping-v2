<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCart extends Model
{
    use SoftDeletes;
    
    protected $table = 'carts';
    protected $guarded = [];

    public function order(){
        return $this->hasOne('App\Models\Order');
    }
}
