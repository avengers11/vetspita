<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //Service
    public function service()
    {
        $categories = ServiceCategory::with('services')->latest()->get();

        return view('frontend.services', compact('categories'));
    }

    //ServiceView
    public function serviceDetails(Service $service)
    {
        return view('frontend.service_details', compact('service'));
    }
}
