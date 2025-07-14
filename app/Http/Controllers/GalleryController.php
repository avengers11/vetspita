<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //image
    public function image()
    {
        $gallery = Gallery::latest()->where('type', 'image')->get();

        return view('frontend.image_gallery', compact('gallery'));
    }

    //video
    public function video()
    {
        $gallery = Gallery::latest()->where('type', 'video')->get();

        return view('frontend.video_gallery', compact('gallery'));
    }
}
