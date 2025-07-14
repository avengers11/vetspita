<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $casts = [
        'is_feature' => 'boolean'
    ];

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
