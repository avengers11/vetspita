<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    //career
    public function career()
    {
        $careers = Career::latest()->get();

        return view('frontend.career', compact('careers'));
    }
}
