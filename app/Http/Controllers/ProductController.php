<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Plan;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductOrder;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function details(Product $product)
    {
        // Review rate 
        $totalReviews = $product->reviews()->count();
        $totalRatings = $product->reviews->sum('ratings');
        $totalStar = $totalReviews * 5;
        $fiveStarRatingRate = $totalStar > 0 ? ($totalRatings / $totalStar) * 5 : 0;
        $rattingIcons = generateRatingIcons($fiveStarRatingRate);

        // price & disscount 
        $originalPrice  = $product->price;
        $discountPercentage  = $product->discount;
        $finalPrice = 0;
        if(!empty($discountPercentage)){
            $discountAmount = ($originalPrice * $discountPercentage) / 100;
            $finalPrice = $originalPrice - $discountAmount;
        }

        // Best Sellers
        $bestSellers = Product::select('products.*')
        ->join('product_reviews', 'products.id', '=', 'product_reviews.product_id')
        ->selectRaw('COUNT(product_reviews.product_id) as review_count')
        ->groupBy('products.id', 'package_id', 'products.plan_id', 'products.product_category_id', 'products.image', 'products.title', 'products.short_description', 'products.stock', 'products.sku', 'products.price', 'products.discount', 'products.details_table', 'products.details', 'products.eligibility', 'products.more_details', 'products.is_featured', 'products.status', 'products.created_at', 'products.updated_at')
        ->orderByDesc('review_count')
        ->where('products.id', '!=', $product->id)
        ->limit(4)
        ->get();

        // Related Plans
        $relatedPlans = [];
        if(!empty($product->product_category_id)){
            $relatedPlans = Product::where('product_category_id', $product->product_category_id)->where('id', '!=', $product->id)->latest()->get();
        }else if(!empty($product->plan_id)){
            $relatedPlans = Product::where('plan_id', $product->plan_id)->where('id', '!=', $product->id)->latest()->get();
        }else{
            $relatedPlans = Product::where('package_id', $product->package_id)->where('id', '!=', $product->id)->latest()->get();
        }

        return view('frontend.plan_details', compact('product', 'fiveStarRatingRate', 'totalReviews', 'finalPrice', 'originalPrice', 'discountPercentage', 'rattingIcons', 'relatedPlans', 'bestSellers'));
    }
    public function filtered(Request $req)
    {
        $products = "";
        $totalProducts = 0;
        $category_name = "";
        $category_data = [];
        $category_name_dynamic = "";

        // package 
        if(isset($req->package) && !isset($req->plan)){
            $products = Product::latest()->where('package_id', $req->package)->get();
            $totalProducts = Product::latest()->where('package_id', $req->package)->count();
            $category_name = "Plans";

            $category_data = Plan::latest()->get();
            if(isset($req->package)){
                $category_data = Plan::latest()->where('package_id', $req->package)->get();
            }

            $category_name_dynamic = Package::find($req->package)->title;
        }

        // plan
        else if(isset($req->plan) && !isset($req->category)){
            $products = Product::latest()->where('plan_id', $req->plan)->get();
            $totalProducts = Product::latest()->where('plan_id', $req->plan)->count();
            $category_name = "Category";
            $category_data = ProductCategory::latest()->get();

            if(isset($req->plan)){
                $category_data = ProductCategory::latest()->where('plan_id', $req->plan)->get();
            }
        }

        // category
        else if(isset($req->category) && isset($req->category)){
            $products = Product::latest()->where('product_category_id', $req->category)->get();
            $totalProducts = Product::latest()->where('product_category_id', $req->category)->count();
            $category_name = "Category";
            $category_data = ProductCategory::latest()->get();

            if(isset($req->plan)){
                $category_data = ProductCategory::latest()->where('plan_id', $req->plan)->get();
            }
        }
        else{
            $products = Product::latest()->get();
            $totalProducts = Product::latest()->count();
            $category_name = "Packages";
            $category_data = Package::latest()->get();
        }
        return view('frontend.filtered_plans', compact('products', 'totalProducts', 'category_name', 'category_data', 'category_name_dynamic'));
    }


    /*
    =======================
    checkout
    =======================
    */
    // order
    public function order(){
        $user = Auth::user();
        $orders = ProductOrder::latest()->where("user_id", $user->id)->get();

        return view('frontend.my_orders', compact('orders'));
    }

    public function checkout(Request $request, Product $product)
    {
        $user = Auth::user();

        // price & disscount 
        $originalPrice  = $product->price;
        $discountPercentage  = $product->discount;
        $finalPrice = 0;
        $paymentAmount = $originalPrice;
        if(!empty($discountPercentage)){
            $discountAmount = ($originalPrice * $discountPercentage) / 100;
            $finalPrice = $originalPrice - $discountAmount;
            $paymentAmount = $finalPrice;
        }
        

        if($request->isMethod("POST")){
            $order = new ProductOrder();
            $order->user_id = $user->id;
            $order->product_id = $product->id;
            $order->product_price = $paymentAmount;
            $order->payment_method = $request->payment_method;
            $order->trx_id = $request->trx_id;
            $order->status = "pending";
            $order->save();

            return redirect(route("order.index"))->with(['status' => true, 'msg' => 'Your order information, successfully submited!']);
        }
        

        return view('frontend.checkout', compact('product', 'finalPrice', 'discountPercentage', 'paymentAmount'));
    }
}
