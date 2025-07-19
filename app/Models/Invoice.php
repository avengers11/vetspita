<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    function pet(){
        return $this->belongsTo(Pet::class, 'patient_id', 'unique_id');
    }
}
