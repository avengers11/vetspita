<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\MedicineFrequency;
use App\Models\MedicineHistory;
use App\Models\MedicineRoute;
use App\Models\Pet;
use App\Models\PetSpecies;
use App\Models\Prescription;
use App\Models\SearchHistory;
use App\Models\Test;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPrescriptionController extends Controller
{
    /*
    =======================
            prescription
    =======================
    */
    public function prescription(Request $req)
    {
        $user = Auth::user();
        $type = isset($req->type) && $req->type =="saved"  ? "saved" : "normal";
        $dataTypes = Prescription::latest()->where("type", $type)->get();

        // permission 
        if(!$user->can('Saved Prescription View') && $type =="saved"){
            return "You can't access this page!";
        }

        return view('admin.prescription.index', compact('dataTypes', 'type'));
    }
    public function addPrescription(Request $req)
    {
        $user = Auth::user();
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

        // permission 
        if(!$user->can('Saved Prescription Add') && $type =="saved"){
            return "You can't access this page!";
        }

        // patient id 
        $pet = null;
        if(isset($req->patient_id)){
            $pet = Pet::where("id", $req->patient_id)->first();
        }

        return view('admin.prescription.add', compact('users', 'savedPrescription', 'medicines', 'type', 'species', 'pets', 'medicineCategories', 'tests', 'frequncy', 'routes', 'pet'));
    }
    public function storePrescription(Request $req)
    {
        // try {
            // history  
            $medicineHistories = [];
            if(!empty($req->medicine_id)){
                foreach ($req->medicine_id as $index=>$value) {
                    $medicineHistories[] = [
                        "medicine_id" => $value,
                        "medicine_category" => $req->medicine_category[$index],
                        "medicine_name" => $req->medicine_name[$index],
                        "medicine_scientfic_name" => $req->medicine_scientfic_name[$index],
                        "medicine_measure" => $req->medicine_measure[$index],
                        "medicine_sig" => $req->medicine_sig[$index],
                        "medicine_route" => $req->medicine_route[$index],
                        "medicine_frequency" => $req->medicine_frequency[$index],
                        "medicine_dosage" => $req->medicine_dosage[$index],
                        "medicine_duration" => $req->medicine_duration[$index],
                        "medicine_additional_details" => $req->medicine_additional_details[$index],
                    ];
                }
                $medicineHistories = $medicineHistories;
            }

            $prescription = new Prescription();
            $prescription->branche_id = $req->branche_id;
            $prescription->prescription_name = $req->prescription_name;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->vaccinated = $req->vaccinated;
            $prescription->vaccinated_date = $req->vaccinated_date;
            $prescription->deworming = $req->deworming;
            $prescription->deworming_date = $req->deworming_date;
            $prescription->medicine_history = json_encode($medicineHistories);
            $prescription->clinical_history = $req->clinical_history;
            $prescription->test_suggestions = json_encode($req->test_suggestions);
            $prescription->clinical_findings = $req->clinical_findings;
            $prescription->diagnosis = $req->diagnosis;
            $prescription->date = $req->date;
            $prescription->advice = $req->advice;
            $prescription->address = $req->address;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->type = $req->type;
            $prescription->doctor_id = Auth::user()->id;
            $prescription->user_id = $req->user_id;
            $prescription->save();
        
            return redirect(route('admin.prescription.index', ['type' => $req->type]))->with(['status' => true, 'msg' => 'You are successfully created a prescription!']);
        // } catch (\Throwable $th) {
        //     return redirect(route('admin.prescription.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        // }
    }
    public function generateUniquePrescriptionId() {
        do {
            $uniqueId = mt_rand(1000000000, 9999999999);
        } while (Prescription::where('unique_id', $uniqueId)->exists());
    
        return $uniqueId;
    }
    public function editPrescription(Prescription $prescription, Request $req)
    {
        $user = Auth::user();
        $users = User::latest()->where('user_type', 'patient')->get();
        $patient = User::find($prescription->user_id);
        $pets = Pet::latest()->get();
        $pet = Pet::where("unique_id", $prescription->patient_id)->first();
        $savedPrescription = Prescription::latest()->where("type", "saved")->get();
        $medicines = Medicine::latest()->get();
        $medicineCategories = MedicineCategory::orderBy("order", 'DESC')->get();
        $type = isset($req->type) && $req->type == "saved"  ? "saved" : "normal";
        $species = PetSpecies::latest()->orderBy('order', 'DESC')->get();
        $tests = Test::latest()->get();
        $frequncy = MedicineFrequency::orderBy('order', 'DESC')->get();
        $routes = MedicineRoute::orderBy('order', 'DESC')->get();

        // permission 
        if(!$user->can('Saved Prescription Add') && $type =="saved"){
            return "You can't access this page!";
        }
        
        
        return view('admin.prescription.edit', compact('users', 'savedPrescription', 'medicines', 'type', 'species', 'pets', 'medicineCategories', 'tests', 'frequncy', 'routes', 'pet', 'patient', "prescription"));
    }
    public function updatePrescription(Prescription $prescription, Request $req)
    {
        // try {
            // history  
            $medicineHistories = [];
            if(!empty($req->medicine_id)){
                foreach ($req->medicine_id as $index=>$value) {
                    $medicineHistories[] = [
                        "medicine_id" => $value,
                        "medicine_category" => $req->medicine_category[$index],
                        "medicine_name" => $req->medicine_name[$index],
                        "medicine_scientfic_name" => $req->medicine_scientfic_name[$index],
                        "medicine_measure" => $req->medicine_measure[$index],
                        "medicine_sig" => $req->medicine_sig[$index],
                        "medicine_route" => $req->medicine_route[$index],
                        "medicine_frequency" => $req->medicine_frequency[$index],
                        "medicine_dosage" => $req->medicine_dosage[$index],
                        "medicine_duration" => $req->medicine_duration[$index],
                        "medicine_additional_details" => $req->medicine_additional_details[$index],
                    ];
                }
                $medicineHistories = $medicineHistories;
            }

            $prescription->branche_id = $req->branche_id;
            $prescription->prescription_name = $req->prescription_name;
            $prescription->owner_name = $req->owner_name;
            $prescription->owner_number = $req->owner_number;
            $prescription->pet_name = $req->pet_name;
            $prescription->pet_species = $req->pet_species;
            $prescription->pet_breed = $req->pet_breed;
            $prescription->pet_sex = $req->pet_sex;
            $prescription->pet_age = $req->pet_age;
            $prescription->pet_weight = $req->pet_weight;
            $prescription->vaccinated = $req->vaccinated;
            $prescription->vaccinated_date = $req->vaccinated_date;
            $prescription->deworming = $req->deworming;
            $prescription->deworming_date = $req->deworming_date;
            $prescription->medicine_history = json_encode($medicineHistories);
            $prescription->clinical_history = $req->clinical_history;
            $prescription->test_suggestions = json_encode($req->test_suggestions);
            $prescription->clinical_findings = $req->clinical_findings;
            $prescription->diagnosis = $req->diagnosis;
            $prescription->date = $req->date;
            $prescription->advice = $req->advice;
            $prescription->address = $req->address;
            $prescription->unique_id = $this->generateUniquePrescriptionId();
            $prescription->patient_id = $req->patient_id;
            $prescription->type = $req->type;
            $prescription->doctor_id = Auth::user()->id;
            $prescription->user_id = $req->user_id;
            $prescription->save();
        
            return redirect(route('admin.prescription.index', ['type' => $req->type]))->with(['status' => true, 'msg' => 'You are successfully updated a prescription!']);
        // } catch (\Throwable $th) {
        //     return redirect(route('admin.prescription.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        // }
    }
    public function deletePrescription(Prescription $prescription, Request $req)
    {
        $prescription->delete();

        return redirect(route('admin.prescription.index', ['type' => $req->type]))->with(['status' => true, 'msg' => 'You are successfully deleted a prescription!']);
    }
    public function userInfoPrescription(Request $req)
    {
        $user = User::find($req->id);
        return response()->json(['user' => $user, 'pets' => $user->pets]);
    }
    public function petInfoPrescription(Request $req)
    {
        $pet = Pet::find($req->id);
        if(empty($pet)){
            return response()->json([
                "status" => false    
            ]);
        }
        // Target date
        $currentDate = Carbon::now();
        $parsedDate = Carbon::parse($pet->age);
        $years = $parsedDate->diffInYears($currentDate);
        $months = $parsedDate->copy()->addYears($years)->diffInMonths($currentDate);
        $pet->years = $years;
        $pet->months = $months;
        
        return response()->json(["pet" => $pet, "user" => $pet->user, "status" => true]);
    }
    public function info(Request $req)
    {
        $prescription = Prescription::with('histories.medicine')->find($req->id);

        return response()->json($prescription);
    }
    public function savedinfo($id)
    {
        $prescription = Prescription::find($id);

        return response()->json($prescription);
    }
    public function print(Prescription $prescription)
    {
        return view('admin.prescription.print', compact('prescription'));
    }
    public function userPetAdd(Request $req)
    {
        try {
            if(User::where('number', $req->userNumber)->exists()){
                return response()->json(['status' => false, "msg" => "This number is already used!"]);
            }

            // Input values
            $age_year = $req->ageYear;
            $age_month = $req->ageMonth;

            $currentDate = Carbon::now();
            $dateOfBirth = $currentDate->subYears($age_year)->subMonths($age_month);
            $dobFormatted = $dateOfBirth->format('Y-m-d');

            $user = new User;
            $user->name = $req->userName;
            $user->email = "";
            $user->number = $req->userNumber;
            $user->address = "";
            $user->password = "00000000";
            $user->image = "";
            $user->user_id = $this->generateUniqueUserId();
            $user->user_type = 'patient';
            $user->save();

            $pet = new Pet; 
            $pet->user_id = $user->id;
            $pet->name = $req->petName;
            $pet->species = $req->species;
            $pet->breed = $req->breed;
            $pet->age = $dobFormatted;
            $pet->sex = $req->sex;
            $pet->weight = $req->weight;
            $pet->unique_id = $this->generateUniquePetId();
            $pet->save();

            return response()->json(['status' => true, "msg" => "Data successfully added!"]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, "msg" => "error: $th"]);
        }
    }
    private function generateUniqueUserId() {
        do {
            $uniqueId = mt_rand(1000000000, 9999999999);
        } while (User::where('user_id', $uniqueId)->exists());
    
        return $uniqueId;
    }
    private function generateUniquePetId() {
        do {
            $uniqueId = mt_rand(1000000000, 9999999999);
        } while (\App\Models\User::where('user_id', $uniqueId)->exists());
    
        return $uniqueId;
    }
    
    // search 
    public function addSearchHistory(Request $req){
        if(empty($req->text)){
            return;
        }
        if(!SearchHistory::where("text", $req->text)->exists()){
            $history = new SearchHistory();
            $history->text = $req->text;
            $history->save();
        }
    }
    public function getSearchHistory(Request $req){
        return response()->json(SearchHistory::whereRaw('LOWER(text) LIKE ?', ['%' . strtolower($req->text) . '%'])->get());
    }
}
