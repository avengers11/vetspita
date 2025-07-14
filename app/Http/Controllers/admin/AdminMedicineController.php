<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\MedicineFrequency;
use App\Models\MedicineRoute;
use Illuminate\Http\Request;

class AdminMedicineController extends Controller
{
    /*
    =======================
            medicine
    =======================
    */
    public function medicine()
    {
        $dataTypes = Medicine::latest()->get();

        return view('admin.medicine.index', compact('dataTypes'));
    }
    public function addMedicine()
    {
        $categories = MedicineCategory::latest()->orderBy('order', 'DESC')->get();
        return view('admin.medicine.add', compact('categories'));
    }
    public function storeMedicine(Request $req)
    {
        try {
            $medicine = new Medicine();
            $medicine->category = $req->category;
            $medicine->name = $req->name;
            $medicine->scientific = $req->scientific;
            $medicine->measure = $req->measure;
            $medicine->short = $req->short;
            $medicine->save();

            // response type 
            if($req->response == "json"){
                return response()->json(["status" => true, "message" => "You are successfully created a medicine!", "medicine" => $medicine]);
            }else{
                return redirect(route('admin.medicine.index'))->with(['status' => true, 'msg' => 'You are successfully created a medicine!']);
            }
        } catch (\Throwable $th) {
            if($req->response == "json"){
                return response()->json(["status" => false, "message" => "Error Type: '.$th"]);
            }else{
                return redirect(route('admin.medicine.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
            }
        }
    }
    public function editMedicine(Medicine $medicine)
    {
        $categories = MedicineCategory::latest()->orderBy('order', 'DESC')->get();
        return view('admin.medicine.edit', compact('medicine', 'categories'));
    }
    public function updateMedicine(Medicine $medicine, Request $req)
    {
        try {
            $medicine->category = $req->category;
            $medicine->name = $req->name;
            $medicine->scientific = $req->scientific;
            $medicine->measure = $req->measure;
            $medicine->short = $req->short;
            $medicine->save();
        
            return redirect(route('admin.medicine.index'))->with(['status' => true, 'msg' => 'You are successfully updated a medicine!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.medicine.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteMedicine(Medicine $medicine)
    {
        $medicine->delete();

        return redirect(route('admin.medicine.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a medicine!']);
    }



    /*
    =======================
            category
    =======================
    */
    public function category()
    {
        $dataTypes = MedicineCategory::latest()->orderBy('order', 'DESC')->get();

        return view('admin.medicine.category.index', compact('dataTypes'));
    }
    public function addMedicineCategory()
    {
        return view('admin.medicine.category.add');
    }
    public function storeMedicineCategory(Request $req)
    {
        try {
            $autoOrder = $req->order;
            if($autoOrder == null){
                $autoOrder = 1 + (MedicineCategory::latest()->first() !== null ? MedicineCategory::latest()->first()->order : 0);
            }

            $medicineCategory = new MedicineCategory();
            $medicineCategory->name = $req->name;
            $medicineCategory->order = $autoOrder;
            $medicineCategory->save();

            // response type 
            if($req->response == "json"){
                return response()->json(["status" => true, "message" => "You are successfully created a medicine category!"]);
            }else{
                return redirect(route('admin.medicine.category.index'))->with(['status' => true, 'msg' => 'You are successfully created a medicine category!']);
            }
        
        } catch (\Throwable $th) {
            if($req->response == "json"){
                return response()->json(["status" => false, "message" => "Error: $th"]);
            }else{
                return redirect(route('admin.medicine.category.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
            }
        }
    }
    public function editMedicineCategory(MedicineCategory $category)
    {
        return view('admin.medicine.category.edit', compact('category'));
    }
    public function updateMedicineCategory(MedicineCategory $category, Request $req)
    {
        try {
            $category->name = $req->name;
            $category->order = $req->order;
            $category->save();
        
            return redirect(route('admin.medicine.category.index'))->with(['status' => true, 'msg' => 'You are successfully updated a medicine category!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.medicine.category.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteMedicineCategory(MedicineCategory $category)
    {
        $category->delete();

        return redirect(route('admin.medicine.category.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a medicine category!']);
    }



    /*
    =======================
            route
    =======================
    */
    public function route()
    {
        $dataTypes = MedicineRoute::latest()->orderBy('order', 'DESC')->get();

        return view('admin.medicine.route.index', compact('dataTypes'));
    }
    public function addMedicineRoute()
    {
        return view('admin.medicine.route.add');
    }
    public function storeMedicineRoute(Request $req)
    {
        try {
            $autoOrder = $req->order;
            if($autoOrder == null){
                $autoOrder = 1 + (MedicineRoute::latest()->first() !== null ? MedicineRoute::latest()->first()->order : 0);
            }

            $medicineRoute = new MedicineRoute();
            $medicineRoute->name = $req->name;
            $medicineRoute->order = $autoOrder;
            $medicineRoute->save();

            // response type 
            if($req->response == "json"){
                return response()->json(["status" => true, "message" => "You are successfully created a medicine route!"]);
            }else{
                return redirect(route('admin.medicine.route.index'))->with(['status' => true, 'msg' => 'You are successfully created a medicine route!']);
            }
        
        } catch (\Throwable $th) {
            if($req->response == "json"){
                return response()->json(["status" => false, "message" => "Error: $th"]);
            }else{
                return redirect(route('admin.medicine.route.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
            }
        }
    }
    public function editMedicineRoute(MedicineRoute $route)
    {
        return view('admin.medicine.route.edit', compact('route'));
    }
    public function updateMedicineRoute(MedicineRoute $route, Request $req)
    {
        try {
            $route->name = $req->name;
            $route->order = $req->order;
            $route->save();
        
            return redirect(route('admin.medicine.route.index'))->with(['status' => true, 'msg' => 'You are successfully updated a medicine route!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.medicine.route.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteMedicineRoute(MedicineRoute $route)
    {
        $route->delete();

        return redirect(route('admin.medicine.route.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a medicine route!']);
    }


    /*
    =======================
            frequency
    =======================
    */
    public function frequency()
    {
        $dataTypes = MedicineFrequency::latest()->orderBy('order', 'DESC')->get();

        return view('admin.medicine.frequency.index', compact('dataTypes'));
    }
    public function addMedicineFrequency()
    {
        return view('admin.medicine.frequency.add');
    }
    public function storeMedicineFrequency(Request $req)
    {
        try {
            $autoOrder = $req->order;
            if($autoOrder == null){
                $autoOrder = 1 + (MedicineFrequency::latest()->first() !== null ? MedicineFrequency::latest()->first()->order : 0);
            }

            $medicineFrequency = new MedicineFrequency();
            $medicineFrequency->name = $req->name;
            $medicineFrequency->order = $autoOrder;
            $medicineFrequency->save();

            // response type 
            if($req->response == "json"){
                return response()->json(["status" => true, "message" => "You are successfully created a medicine frequency!"]);
            }else{
                return redirect(route('admin.medicine.frequency.index'))->with(['status' => true, 'msg' => 'You are successfully created a medicine frequency!']);
            }
        
        } catch (\Throwable $th) {
            if($req->response == "json"){
                return response()->json(["status" => false, "message" => "Error: $th"]);
            }else{
                return redirect(route('admin.medicine.frequency.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
            }
        }
    }
    public function editMedicineFrequency(MedicineFrequency $frequency)
    {
        return view('admin.medicine.frequency.edit', compact('frequency'));
    }
    public function updateMedicineFrequency(MedicineFrequency $frequency, Request $req)
    {
        try {
            $frequency->name = $req->name;
            $frequency->order = $req->order;
            $frequency->save();
        
            return redirect(route('admin.medicine.frequency.index'))->with(['status' => true, 'msg' => 'You are successfully updated a medicine frequency!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.medicine.frequency.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteMedicineFrequency(MedicineFrequency $frequency)
    {
        $frequency->delete();

        return redirect(route('admin.medicine.frequency.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a medicine frequency!']);
    }
}
