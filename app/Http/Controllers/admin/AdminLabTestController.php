<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LabTechnicianTest;
use App\Models\LabTestPrescription;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\MedicineFrequency;
use App\Models\MedicineRoute;
use App\Models\Pet;
use App\Models\PetSpecies;
use App\Models\Prescription;
use App\Models\Test;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AdminLabTestController extends Controller
{
    /*
    ===========================
    all
    ===========================
    */
    public function all()
    {
        $dataTypes = LabTestPrescription::latest()->where("type", "!=", "saved")->get();
        return view('admin.lab-test.test.all.index', compact('dataTypes'));
    }
    public function addAll(Request $req, $template=null)
    {
        // /POST Method
        if($req->isMethod('post')){
            $prescription = new LabTestPrescription();
            $prescription->branche_id = $req->branche_id;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->address = $req->address;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->prescription_content = $req->prescription_content;
            $prescription->date = $req->date;
            $prescription->ref_dr = $req->ref_dr;
            $prescription->type = $template;
            $prescription->save();
        
            return redirect(route('admin.lab.test.all.index'))->with(['status' => true, 'msg' => 'You are successfully created a all report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        $templateData = LabTestPrescription::latest()->where("prescription_name", $template)->first();

        // patient id 
        $pet = null;
        if(isset($req->patient_id)){
            $pet = Pet::where("unique_id", $req->patient_id)->first();
        }
        
        return view('admin.lab-test.test.all.add', compact('users', 'savedPrescription', 'pets', 'pet', 'template', 'templateData'));
    }
    public function deleteAll(LabTestPrescription $all)
    {
        $all->delete();

        return redirect(route('admin.lab.test.all.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a bio report!']);
    }


    /*
    ===========================
    template
    ===========================
    */
    public function template()
    {
        $dataTypes = LabTestPrescription::latest()->where("type", "saved")->get();
        return view('admin.lab-test.test.template.index', compact('dataTypes'));
    }
    public function addTemplate(Request $req, $template=null)
    {
        // /POST Method
        if($req->isMethod('post')){
            $prescription = new LabTestPrescription();
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->prescription_name = $req->prescription_name;
            $prescription->prescription_content = $req->prescription_content;
            $prescription->type = "saved";
            $prescription->save();
        
            return redirect(route('admin.lab.test.template.index'))->with(['status' => true, 'msg' => 'You are successfully created a template report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        
        return view('admin.lab-test.test.template.add', compact('users', 'savedPrescription', 'pets', 'template'));
    }
    public function editTemplate(Request $req, LabTestPrescription $template)
    {
        // /POST Method
        if($req->isMethod('post')){
            $template->prescription_name = $req->prescription_name;
            $template->prescription_content = $req->prescription_content;
            $template->save();
        
            return redirect(route('admin.lab.test.template.index'))->with(['status' => true, 'msg' => 'You are successfully created a template report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        
        return view('admin.lab-test.test.template.edit', compact('users', 'savedPrescription', 'pets', 'template'));
    }
    public function deleteTemplate(LabTestPrescription $template)
    {
        $template->delete();

        return redirect(route('admin.lab.test.template.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a bio report!']);
    }


    /*
    ===========================
    cbc
    ===========================
    */
    public function cbc()
    {
        $dataTypes = LabTestPrescription::latest()->where("type", "cbc")->get();
        return view('admin.lab-test.test.cbc.index', compact('dataTypes'));
    }
    public function addCBC(Request $req)
    {
        // /POST Method
        if($req->isMethod('post')){
            $prescription = new LabTestPrescription();
            $prescription->branche_id = $req->branche_id;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->prescription_name = $req->prescription_name;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->address = $req->address;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->prescription_content = $req->prescription_content;
            $prescription->date = $req->date;
            $prescription->type = "cbc";
            $prescription->save();
        
            return redirect(route('admin.lab.test.cbc.index'))->with(['status' => true, 'msg' => 'You are successfully created a cbc report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        
        return view('admin.lab-test.test.cbc.add', compact('users', 'savedPrescription', 'pets'));
    }
    public function deleteCBC(LabTestPrescription $cbc)
    {
        $cbc->delete();

        return redirect(route('admin.lab.test.cbc.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a bio report!']);
    }

    /*
    ===========================
    bio
    ===========================
    */
    public function bio()
    {
        $dataTypes = LabTestPrescription::latest()->where("type", "bio")->get();
        return view('admin.lab-test.test.bio.index', compact('dataTypes'));
    }
    public function addBio(Request $req)
    {
        // /POST Method
        if($req->isMethod('post')){
            $prescription = new LabTestPrescription();
            $prescription->branche_id = $req->branche_id;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->prescription_name = $req->prescription_name;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->address = $req->address;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->prescription_content = $req->prescription_content;
            $prescription->date = $req->date;
            $prescription->type = "bio";
            $prescription->save();
        
            return redirect(route('admin.lab.test.bio.index'))->with(['status' => true, 'msg' => 'You are successfully created a cbc report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        
        return view('admin.lab-test.test.bio.add', compact('users', 'savedPrescription', 'pets'));
    }
    public function deleteBio(LabTestPrescription $cbc)
    {
        $cbc->delete();

        return redirect(route('admin.lab.test.cbc.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a bio report!']);
    }

    /*
    ===========================
    urine
    ===========================
    */
    public function urine()
    {
        $dataTypes = LabTestPrescription::latest()->where("type", "urine")->get();
        return view('admin.lab-test.test.urine.index', compact('dataTypes'));
    }
    public function addUrine(Request $req)
    {
        // /POST Method
        if($req->isMethod('post')){
            $prescription = new LabTestPrescription();
            $prescription->branche_id = $req->branche_id;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->prescription_name = $req->prescription_name;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->address = $req->address;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->prescription_content = $req->prescription_content;
            $prescription->date = $req->date;
            $prescription->type = "urine";
            $prescription->save();
        
            return redirect(route('admin.lab.test.urine.index'))->with(['status' => true, 'msg' => 'You are successfully created a urine report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        
        return view('admin.lab-test.test.urine.add', compact('users', 'savedPrescription', 'pets'));
    }
    public function deleteUrine(LabTestPrescription $cbc)
    {
        $cbc->delete();

        return redirect(route('admin.lab.test.urine.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a urine report!']);
    }

    /*
    ===========================
    kit
    ===========================
    */
    public function kit()
    {
        $dataTypes = LabTestPrescription::latest()->where("type", "kit")->get();
        return view('admin.lab-test.test.kit.index', compact('dataTypes'));
    }
    public function addKit(Request $req)
    {
        // /POST Method
        if($req->isMethod('post')){
            $prescription = new LabTestPrescription();
            $prescription->branche_id = $req->branche_id;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->prescription_name = $req->prescription_name;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->address = $req->address;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->prescription_content = $req->prescription_content;
            $prescription->date = $req->date;
            $prescription->type = "kit";
            $prescription->save();
        
            return redirect(route('admin.lab.test.kit.index'))->with(['status' => true, 'msg' => 'You are successfully created a kit report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        
        return view('admin.lab-test.test.kit.add', compact('users', 'savedPrescription', 'pets'));
    }
    public function deleteKit(LabTestPrescription $cbc)
    {
        $cbc->delete();

        return redirect(route('admin.lab.test.kit.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a kit report!']);
    }

    /*
    ===========================
    face
    ===========================
    */
    public function face()
    {
        $dataTypes = LabTestPrescription::latest()->where("type", "face")->get();
        return view('admin.lab-test.test.face.index', compact('dataTypes'));
    }
    public function addFace(Request $req)
    {
        // /POST Method
        if($req->isMethod('post')){
            $prescription = new LabTestPrescription();
            $prescription->branche_id = $req->branche_id;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->prescription_name = $req->prescription_name;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->address = $req->address;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->prescription_content = $req->prescription_content;
            $prescription->date = $req->date;
            $prescription->type = "face";
            $prescription->save();
        
            return redirect(route('admin.lab.test.face.index'))->with(['status' => true, 'msg' => 'You are successfully created a faces report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        
        return view('admin.lab-test.test.face.add', compact('users', 'savedPrescription', 'pets'));
    }
    public function deleteFace(LabTestPrescription $cbc)
    {
        $cbc->delete();

        return redirect(route('admin.lab.test.face.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a faces report!']);
    }

    /*
    ===========================
    ultra
    ===========================
    */
    public function ultra()
    {
        $dataTypes = LabTestPrescription::latest()->where("type", "ultra")->get();
        return view('admin.lab-test.test.ultra.index', compact('dataTypes'));
    }
    public function addUltra(Request $req)
    {
        // /POST Method
        if($req->isMethod('post')){
            $prescription = new LabTestPrescription();
            $prescription->branche_id = $req->branche_id;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->prescription_name = $req->prescription_name;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->address = $req->address;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->prescription_content = $req->prescription_content;
            $prescription->date = $req->date;
            $prescription->type = "ultra";
            $prescription->save();
        
            return redirect(route('admin.lab.test.ultra.index'))->with(['status' => true, 'msg' => 'You are successfully created a ultrasonic report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        
        return view('admin.lab-test.test.ultra.add', compact('users', 'savedPrescription', 'pets'));
    }
    public function deleteUltra(LabTestPrescription $cbc)
    {
        $cbc->delete();

        return redirect(route('admin.lab.test.ultra.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a ultrasonic report!']);
    }

    /*
    ===========================
    xray
    ===========================
    */
    public function xray()
    {
        $dataTypes = LabTestPrescription::latest()->where("type", "xray")->get();
        return view('admin.lab-test.test.xray.index', compact('dataTypes'));
    }
    public function addXray(Request $req)
    {
        // /POST Method
        if($req->isMethod('post')){
            $prescription = new LabTestPrescription();
            $prescription->branche_id = $req->branche_id;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->prescription_name = $req->prescription_name;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->address = $req->address;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->prescription_content = $req->prescription_content;
            $prescription->date = $req->date;
            $prescription->type = "xray";
            $prescription->save();
        
            return redirect(route('admin.lab.test.xray.index'))->with(['status' => true, 'msg' => 'You are successfully created a X-ray report!']);
        }


        // /GET Method  
        $users = User::latest()->where('user_type', 'patient')->get();
        $pets = Pet::latest()->get();
        $savedPrescription = LabTestPrescription::latest()->where("type", "saved")->get();
        
        return view('admin.lab-test.test.xray.add', compact('users', 'savedPrescription', 'pets'));
    }
    public function deleteXray(LabTestPrescription $cbc)
    {
        $cbc->delete();

        return redirect(route('admin.lab.test.xray.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a X-ray report!']);
    }

    /*
    ===========================
    General
    ===========================
    */
    public function parentsInfo(Request $req)
    {
        $user = User::find($req->id);
        return response()->json(['user' => $user, 'pets' => $user->pets]);
    }
    public function patientInfo(Request $req)
    {
        $pet = Pet::find($req->id);
        // Target date
        $currentDate = Carbon::now();
        $parsedDate = Carbon::parse($pet->age);
        $years = $parsedDate->diffInYears($currentDate);
        $months = $parsedDate->copy()->addYears($years)->diffInMonths($currentDate);
        $pet->years = $years;
        $pet->months = $months;
        
        return response()->json(["pet" => $pet, "user" => $pet->user]);
    }
    public function saveReport(Request $req)
    {
        $report = LabTestPrescription::find($req->id);
        return response()->json($report);
    }
    public function generateUniquePrescriptionId() {
        do {
            $uniqueId = mt_rand(1000000000, 9999999999);
        } while (Prescription::where('unique_id', $uniqueId)->exists());
    
        return $uniqueId;
    }

    /*
    ===========================
    Task
    ===========================
    */
    public function task(Request $req)
    {
        $dataTypes = LabTechnicianTest::latest()->where("test_id", "!=", null)->get();

        return view("admin.lab-test.task.index", compact('dataTypes'));
    }
    public function statusTest(LabTechnicianTest $task, Request $request)
    {
        $task->status = $request->status;
        $task->save();

        // create new 
        if($request->status == "success"){
            return redirect(route("admin.lab.test.all.add", ["patient_id" => $task->patient_id]));
        }
        
        return back()->with(["status" => true, "msg" => "You are successfully deleted a task!"]);
    }
    public function deleteTest(LabTechnicianTest $task)
    {
        $task->delete();

        return back()->with(["status" => true, "msg" => "You are successfully deleted a task!"]);
    }
}
