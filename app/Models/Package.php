<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    function products(){
        return $this->hasMany(Product::class, 'package_id');
    }

    function plans(){
        return $this->hasMany(Plan::class, 'package_id');
    }
}
