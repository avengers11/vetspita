<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTechnicianTest extends Model
{
    use HasFactory;

    public function test(){
        return $this->belongsTo(Test::class, "test_id");
    }
    
    public function invoiceTest(){
        return $this->belongsTo(InvoiceEquipment::class, "test_id");
    }
}
