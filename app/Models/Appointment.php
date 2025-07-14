<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    function pet(){
        return $this->belongsTo(Pet::class, 'patient_id');
    }

    function doctor(){
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
