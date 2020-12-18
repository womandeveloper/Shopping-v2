<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = "category";
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany(Product::class,'category_product');
    }
}
