<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    function pet(){
        return $this->belongsTo(Pet::class, 'pet_id');
    }
    function histories(){
        return $this->hasMany(MedicineHistory::class, 'prescription_id');
    }
    function doctor(){
        return $this->belongsTo(Consultant::class, 'pet_id');
    }
}
