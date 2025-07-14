<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Utils\Utils;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminServiceController extends Controller
{
    /*
    =======================
            SERVICE
    =======================
    */
    public function service()
    {
        $dataTypes = Service::latest()->get();

        return view('admin.service.index', compact('dataTypes'));
    }
    public function addService()
    {
        $categories = ServiceCategory::latest()->get();
        return view('admin.service.add', compact('categories'));
    }
    public function storeService(Request $req)
    {
        try {

            $service = new Service();
            $service->service_category_id = $req->service_category_id;
            $service->title = $req->title;
            $service->description = $req->description;
            $service->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'service') : "placeholder.png";
            $service->save();
        
            return redirect(route('admin.service.index'))->with(['status' => true, 'msg' => 'You are successfully created a service!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.service.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editService(Service $service)
    {
        $categories = ServiceCategory::latest()->get();

        return view('admin.service.edit', compact('service', 'categories'));
    }
    public function updateService(Service $service, Request $req)
    {
        try {
            $image = "";
            if(!empty($req->image)){
                $image = Utils::processFile($req->file('image'), 'service');
                Storage::delete($service->image);
            }else{
                $image = $service->image;
            }
        
            $service->image = $image;
            $service->title = $req->title;
            $service->description = $req->description;
            $service->service_category_id = $req->service_category_id;
            $service->save();
        
            return redirect(route('admin.service.index'))->with(['status' => true, 'msg' => 'You are successfully updated a service!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.service.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteService(Service $service)
    {
        if (Storage::exists($service->image)) {
            Storage::delete($service->image);
        }
        $service->delete();

        return redirect(route('admin.service.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a service!']);
    }



    /*
    =======================
            Category
    =======================
    */
    public function category()
    {
        $dataTypes = ServiceCategory::latest()->get();

        return view('admin.service.category.index', compact('dataTypes'));
    }
    public function addCategory()
    {
        return view('admin.service.category.add');
    }
    public function storeCategory(Request $req)
    {
        try {
           
            $category = new ServiceCategory();
            $category->name = $req->name;
            $category->save();
        
            return redirect(route('admin.serviceCategory.index'))->with(['status' => true, 'msg' => 'You are successfully created a category!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.serviceCategory.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editCategory(ServiceCategory $category)
    {
        return view('admin.service.category.edit', compact('category'));
    }
    public function updateCategory(ServiceCategory $category, Request $req)
    {
        try {
            $category->name = $req->name;
            $category->save();
        
            return redirect(route('admin.serviceCategory.index'))->with(['status' => true, 'msg' => 'You are successfully updated a category!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.serviceCategory.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteCategory(ServiceCategory $category)
    {
        $category->delete();

        return redirect(route('admin.serviceCategory.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a category!']);
    }
}
