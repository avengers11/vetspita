<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class eConsultationController extends Controller
{
    //eConsultation
    public function eConsultation(){
        return view('frontend.e_consultation');
    }
}
