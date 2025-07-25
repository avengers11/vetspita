<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    function plan(){
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    function products(){
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
