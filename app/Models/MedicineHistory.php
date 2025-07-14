<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineHistory extends Model
{
    use HasFactory;

    function medicine(){
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
