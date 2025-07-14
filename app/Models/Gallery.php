<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    function branch(){
        return $this->belongsTo(Branch::class, 'branche_id');
    }
}
