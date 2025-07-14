<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }

    function categories(){
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    function products(){
        return $this->hasMany(Product::class, 'plan_id');
    }
}
