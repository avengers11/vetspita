<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        "is_featured" => "boolean",
        "status" => "boolean",
    ];

    function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }

    function plan(){
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    function category(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    function reviews(){
        return $this->hasMany(ProductReview::class, 'product_id');
    }

}
