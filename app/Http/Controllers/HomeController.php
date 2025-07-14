<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Package;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\ServiceCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //home
    public function home()
    {
        $sliders = Slider::orderBy('order', 'DESC')->get();
        $categories = ServiceCategory::with('services')->latest()->get();
        $products = Product::where('is_featured', 1)->latest()->take(10)->get();
        $members = Consultant::latest()->get();
        $reviews = ProductReview::where('is_feature', 1)->latest()->take(12)->get();
        $posts = Post::latest()->take(12)->get();
        $packages = Package::latest()->get();


        return view('frontend.index', compact('categories', 'sliders', 'products', 'members', 'reviews', 'posts', 'packages'));
    }
}
