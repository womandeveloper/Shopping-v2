<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';
    protected $guarded =  [];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_product');
    }
}
