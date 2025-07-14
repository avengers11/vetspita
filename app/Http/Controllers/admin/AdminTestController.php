<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\MedicineFrequency;
use App\Models\MedicineRoute;
use App\Models\Pet;
use App\Models\PetSpecies;
use App\Models\Prescription;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTestController extends Controller
{
    /*
    =======================
            test
    =======================
    */
    public function test()
    {
        $dataTypes = Test::latest()->get();

        return view('admin.test.index', compact('dataTypes'));
    }
    public function addTest()
    {
        return view('admin.test.add');
    }
    public function storeTest(Request $req)
    {
        try {
            $test = new Test();
            $test->name = $req->name;
            $test->shortcut = $req->shortcut;
            $test->sample_type = $req->sample_type;
            $test->price = $req->price;
            $test->details = $req->details;
            $test->save();
        
            return redirect(route('admin.test.index'))->with(['status' => true, 'msg' => 'You are successfully created a test!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.test.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editTest(Test $test)
    {
        return view('admin.test.edit', compact('test'));
    }
    public function updateTest(Test $test, Request $req)
    {
        try {
            $test->name = $req->name;
            $test->shortcut = $req->shortcut;
            $test->sample_type = $req->sample_type;
            $test->price = $req->price;
            $test->details = $req->details;
            $test->save();
        
            return redirect(route('admin.test.index'))->with(['status' => true, 'msg' => 'You are successfully updated a test!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.test.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteTest(Test $test)
    {
        $test->delete();

        return redirect(route('admin.test.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a test!']);
    }

    /*
    =======================
            Report
    =======================
    */
    public function report()
    {
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = Prescription::latest()->where("type", "saved")->get();
        $medicines = Medicine::latest()->get();
        $medicineCategories = MedicineCategory::orderBy("order", 'DESC')->get();
        $type = isset($req->type) && $req->type == "saved"  ? "saved" : "normal";
        $species = PetSpecies::latest()->orderBy('order', 'DESC')->get();
        $tests = Test::latest()->get();
        $frequncy = MedicineFrequency::orderBy('order', 'DESC')->get();
        $routes = MedicineRoute::orderBy('order', 'DESC')->get();
        $type = "normal";
        
        return view('admin.test.report.index', compact('users', 'savedPrescription', 'medicines', 'type', 'species', 'pets', 'medicineCategories', 'tests', 'frequncy', 'routes', 'type'));
    }
}
