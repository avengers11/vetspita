<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Utils\Utils;
use App\Models\Package;
use App\Models\Plan;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductOrder;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    /*
    =======================
            PRODUCTS
    =======================
    */
    public function product()
    {
        $dataTypes = Product::latest()->get();

        return view('admin.product.lists.index', compact('dataTypes'));
    }
    public function addProduct()
    {
        $packages = Package::latest()->get();
        $plans = Plan::latest()->get();
        $categories = ProductCategory::latest()->get();
        $sku = 'SKU-' . strtoupper(uniqid());
        return view('admin.product.lists.add', compact('categories', 'packages', 'plans', 'sku'));
    }
    public function storeProduct(Request $req)
    {
        try {
            $detailsArray = [
                "package_validity" => "",
                "wellness_or_sick_visit" => "",
                "virtual_chat_with_information_centre" => "",
                "vaccination_core_dhppi_corona" => "",
                "rabies_first_vaccination" => "",
                "rabies_second_vaccination" => "",
                "kennel_cough_vaccination" => "",
                "puppy_deworming" => "",
                "tick_or_flea_treatment" => "",
                "basic_grooming_session" => "",
                "swimming" => "",
                "fecal_testing" => "",
                "teleconsultation_or_online_consultation" => "",
                "hip_xray_3_or_6_months" => "",
                "health_and_fitness_certificate" => "",
                "basic_blood_test" => "",
                "cbc" => "",
                "dog_food_and_medicine_discount" => "",
                "toys_and_accessories" => "",
                "nutrition_or_diet_consult_with_prior_appointment" => ""
            ];
    
            $detailsJson = [];
            foreach ($detailsArray as $key => $value) {
                $detailsJson[] = [
                    $key => $req->$key
                ];
            }
            
            $product = new Product();
            $product->package_id = $req->package_id;
            $product->plan_id = $req->plan_id;
            $product->product_category_id = $req->product_category_id;
            $product->title = $req->title;
            $product->short_description = $req->short_description;
            $product->stock = $req->stock;
            $product->sku = $req->sku;
            $product->price = $req->price;
            $product->discount = $req->discount;
            $product->details = json_encode($detailsJson);
            $product->more_details = $req->more_details;
            $product->is_featured = $req->is_featured;
            $product->status = $req->status;
            $product->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'product') : "placeholder.png";
            $product->save();
        
            return redirect(route('admin.product.list.index'))->with(['status' => true, 'msg' => 'You are successfully created a product!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.product.list.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editProduct(Product $product)
    {
        $packages = Package::latest()->get();
        $plans = Plan::latest()->get();
        $categories = ProductCategory::latest()->get();

        return view('admin.product.lists.edit', compact('categories', 'packages', 'plans', 'product'));
    }
    public function updateProduct(Product $product, Request $req)
    {
        try {
            $detailsArray = [
                "package_validity" => "",
                "wellness_or_sick_visit" => "",
                "virtual_chat_with_information_centre" => "",
                "vaccination_core_dhppi_corona" => "",
                "rabies_first_vaccination" => "",
                "rabies_second_vaccination" => "",
                "kennel_cough_vaccination" => "",
                "puppy_deworming" => "",
                "tick_or_flea_treatment" => "",
                "basic_grooming_session" => "",
                "swimming" => "",
                "fecal_testing" => "",
                "teleconsultation_or_online_consultation" => "",
                "hip_xray_3_or_6_months" => "",
                "health_and_fitness_certificate" => "",
                "basic_blood_test" => "",
                "cbc" => "",
                "dog_food_and_medicine_discount" => "",
                "toys_and_accessories" => "",
                "nutrition_or_diet_consult_with_prior_appointment" => ""
            ];
    
            $detailsJson = [];
            foreach ($detailsArray as $key => $value) {
                $detailsJson[] = [
                    $key => $req->$key
                ];
            }

            $image = "";
            if(!empty($req->image)){
                $image = Utils::processFile($req->file('image'), 'product');
                Storage::delete($product->image);
            }else{
                $image = $product->image;
            }
        
            $product->package_id = $req->package_id;
            $product->plan_id = $req->plan_id;
            $product->product_category_id = $req->product_category_id;
            $product->title = $req->title;
            $product->short_description = $req->short_description;
            $product->stock = $req->stock;
            $product->sku = $req->sku;
            $product->price = $req->price;
            $product->discount = $req->discount;
            $product->is_featured = $req->is_featured;
            $product->status = $req->status;
            $product->details = json_encode($detailsJson);
            $product->more_details = $req->more_details;
            $product->image = $image;
            $product->save();
        
            return redirect(route('admin.product.list.index'))->with(['status' => true, 'msg' => 'You are successfully updated a product!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.list.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteProduct(Product $product)
    {
        if (Storage::exists($product->image)) {
            Storage::delete($product->image);
        }
        $product->delete();

        return redirect(route('admin.product.list.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a product!']);
    }
    public function getPlanProduct(Request $req)
    {
        $id = $req->id;
        $plans = Plan::where('package_id', $id)->get();

        return response()->json(['plans' => $plans]);
    }
    public function getCategoryProduct(Request $req)
    {
        $id = $req->id;
        $plans = ProductCategory::where('plan_id', $id)->get();

        return response()->json(['category' => $plans]);
    }

    /*
    =======================
            PACKAGE
    =======================
    */
    public function package()
    {
        $dataTypes = Package::latest()->get();

        return view('admin.product.packages.index', compact('dataTypes'));
    }
    public function addPackage()
    {
        return view('admin.product.packages.add');
    }
    public function storePackage(Request $req)
    {
        try {
            $package = new Package();
            $package->title = $req->title;
            $package->description = $req->description;
            $package->save();
        
            return redirect(route('admin.product.package.index'))->with(['status' => true, 'msg' => 'You are successfully created a package!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.package.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editPackage(Package $package)
    {
        return view('admin.product.packages.edit', compact('package'));
    }
    public function updatePackage(Package $package, Request $req)
    {
        try {
            $package->title = $req->title;
            $package->description = $req->description;
            $package->save();
        
            return redirect(route('admin.product.package.index'))->with(['status' => true, 'msg' => 'You are successfully updated a package!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.package.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deletePackage(Package $package)
    {
        $package->delete();

        return redirect(route('admin.product.package.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a package!']);
    }

    /*
    =======================
            PLAN
    =======================
    */
    public function plan()
    {
        $dataTypes = Plan::latest()->get();

        return view('admin.product.plans.index', compact('dataTypes'));
    }
    public function addPlan()
    {
        $packages = Package::latest()->get();
        return view('admin.product.plans.add', compact('packages'));
    }
    public function storePlan(Request $req)
    {
        try {
            $plan = new Plan();
            $plan->package_id = $req->package_id;
            $plan->title = $req->title;
            $plan->description = $req->description;
            $plan->save();
        
            return redirect(route('admin.product.plan.index'))->with(['status' => true, 'msg' => 'You are successfully created a plan!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.plan.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editPlan(Plan $plan)
    {
        $packages = Package::latest()->get();
        return view('admin.product.plans.edit', compact('plan', 'packages'));
    }
    public function updatePlan(Plan $plan, Request $req)
    {
        try {
            $plan->package_id = $req->package_id;
            $plan->title = $req->title;
            $plan->description = $req->description;
            $plan->save();
        
            return redirect(route('admin.product.plan.index'))->with(['status' => true, 'msg' => 'You are successfully updated a plan!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.plan.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deletePlan(Plan $plan)
    {
        $plan->delete();

        return redirect(route('admin.product.plan.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a plan!']);
    }

    /*
    =======================
            CATEGORY
    =======================
    */
    public function category()
    {
        $dataTypes = ProductCategory::latest()->get();

        return view('admin.product.categories.index', compact('dataTypes'));
    }
    public function addCategory()
    {
        $plans = Plan::latest()->get();
        return view('admin.product.categories.add', compact('plans'));
    }
    public function storeCategory(Request $req)
    {
        try {

            $category = new ProductCategory();
            $category->plan_id = $req->plan_id;
            $category->title = $req->title;
            $category->description = $req->description;
            $category->save();
        
            return redirect(route('admin.product.category.index'))->with(['status' => true, 'msg' => 'You are successfully created a category!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.category.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editCategory(ProductCategory $category)
    {
        $plans = Plan::latest()->get();
        return view('admin.product.categories.edit', compact('category', 'plans'));
    }
    public function updateCategory(ProductCategory $category, Request $req)
    {
        try {
            $category->plan_id = $req->plan_id;
            $category->title = $req->title;
            $category->description = $req->description;
            $category->save();
        
            return redirect(route('admin.product.category.index'))->with(['status' => true, 'msg' => 'You are successfully updated a category!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.category.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteCategory(ProductCategory $category)
    {
        $category->delete();

        return redirect(route('admin.product.category.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a category!']);
    }

    /*
    =======================
            CATEGORY
    =======================
    */
    public function review()
    {
        $dataTypes = ProductReview::latest()->get();

        return view('admin.product.review.index', compact('dataTypes'));
    }
    public function addReview()
    {
        $users = User::latest()->get();
        $products = Product::latest()->get();
        
        return view('admin.product.review.add', compact('users', 'products'));
    }
    public function storeReview(Request $req)
    {
        try {

            $review = new ProductReview();
            $review->user_id = $req->user_id;
            $review->product_id = $req->product_id;
            $review->description = $req->description;
            $review->ratings = $req->ratings;
            $review->title = $req->title;
            $review->save();
        
            return redirect(route('admin.product.review.index'))->with(['status' => true, 'msg' => 'You are successfully created a review!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.review.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editReview(ProductReview $review)
    {
        $plans = Plan::latest()->get();
        return view('admin.product.review.edit', compact('review', 'plans'));
    }
    public function updateReview(ProductReview $review, Request $req)
    {
        try {
            $review->user_id = $req->user_id;
            $review->product_id = $req->product_id;
            $review->description = $req->description;
            $review->ratings = $req->ratings;
            $review->title = $req->title;
            $review->save();
        
            return redirect(route('admin.product.review.index'))->with(['status' => true, 'msg' => 'You are successfully updated a review!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.review.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function updateReviewStatus(ProductReview $review)
    {
        try {
            $review->status = 'success';
            $review->save();
        
            return redirect(route('admin.product.review.index'))->with(['status' => true, 'msg' => 'You are successfully aproved a review!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.product.review.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteReview(ProductReview $review)
    {
        $review->delete();

        return redirect(route('admin.product.review.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a review!']);
    }
    public function featureReview(ProductReview $review)
    {
        $review->is_feature = $review->is_feature ? 0 : 1;
        $review->save();

        return redirect(route('admin.product.review.index'))->with(['status' => true, 'msg' => 'You are successfully updated review!']);
    }

     /*
    =======================
            ORDERS
    =======================
    */
    public function pending(ProductReview $review)
    {
        $orders = ProductOrder::latest()->where("status", "pending")->get();
        $page = "pending";
        
        return view("admin.product.order.index", compact("orders", "page"));
    }
    public function success(ProductReview $review)
    {
        $orders = ProductOrder::latest()->where("status", "success")->get();
        $page = "success";
        
        return view("admin.product.order.index", compact("orders", "page"));
    }
    public function rejected(ProductReview $review)
    {
        $orders = ProductOrder::latest()->where("status", "reject")->get();
        $page = "reject";
        
        return view("admin.product.order.index", compact("orders", "page"));
    }
    public function accept(ProductOrder $order)
    {
        $order->status = "success";
        $order->save();
        
        return back()->with(['status' => true, 'msg' => 'You are successfully accept the order!']);
    }
    public function reject(ProductOrder $order)
    {
        $order->status = "reject";
        $order->save();
        
        return back()->with(['status' => true, 'msg' => 'You are successfully reject the order!']);
    }
    public function delete(ProductOrder $order)
    {
        $order->delete();
        
        return back()->with(['status' => true, 'msg' => 'You are successfully delete the order!']);
    }
}
