<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Utils\Utils;
use App\Models\LabDiognosisPrescription;
use App\Models\Pet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminLabDiognosisController extends Controller
{
    /*
    ===========================
    Biochemical 
    ===========================
    */
    public function index(Request $req)
    {
        $dataTypes = LabDiognosisPrescription::latest()->paginate(10);
        return view('admin.lab-test.test.all.biochemical.index', compact('dataTypes'));
    }
    public function biochemicalAdd(Request $req)
    {
        $users = User::latest()->where('user_type', 'patient')->get();
        $doctors = User::role('Doctor')->latest()->get();
        $pets = Pet::latest()->get();

        // patient id 
        $pet = null;
        if(isset($req->patient_id)){
            $pet = Pet::where("unique_id", $req->patient_id)->first();
        }


        $refs = DB::table('lab_diognosis_refs')
        ->select(
            'category',
            'parameter',
            'abbreviation',
            'canine_ref_range',
            'feline_ref_range',
            'units',
            'id',
        )
        ->where("type", "Biochemical")
        ->orderBy('order', 'asc')
        ->get();

        $formattedData = $refs->groupBy('category')->map(function ($groupedItems) {
            return [
                'category' => $groupedItems->first()->category,
                'data' => $groupedItems->map(function ($item) {
                    return [
                        'parameter' => $item->parameter,
                        'abbreviation' => $item->abbreviation,
                        'canine_ref_range' => $item->canine_ref_range,
                        'feline_ref_range' => $item->feline_ref_range,
                        'units' => $item->units,
                        'id' => $item->id,
                    ];
                })
            ];
        })->values()->toArray();

        return view('admin.lab-test.test.all.biochemical.add', compact('users', 'pets', 'pet', 'formattedData', 'doctors'));
    }
    public function biochemicalCreate(Request $req)
    {   
        // $images = [];
        // foreach ($req->attachment as $imageFile) {
        //     $imagePath = !empty($imageFile) ? Utils::processFile($imageFile, 'lab_diognosis') : "placeholder.png";
        //     $images[] = $imagePath;
        // }

        $contents = [];
        foreach ($req->ref_ids as $index=>$ref_id) {
            $contents[] = [
                "ref_id" => $ref_id,
                "ref_abbreviation" => $req->ref_abbreviations[$index],
                "ref_result" => $req->ref_results[$index],
                "ref_parameter" => $req->ref_parameters[$index],
                "ref_value" => $req->ref_values[$index],
                "ref_unit" => $req->ref_units[$index],
                "ref_comment" => $req->ref_comments[$index],
            ];
        }

        $prescription = new LabDiognosisPrescription();
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
        $prescription->prescription_content = json_encode($contents);
        // $prescription->attachment = json_encode($images);
        $prescription->date = $req->date;
        $prescription->ref_dr = $req->ref_dr;
        $prescription->type = "Biochemical";
        $prescription->save();
    
        return redirect(route('admin.lab-diognosis.biochemical.print', $prescription));
    }
    public function biochemicalPrint(LabDiognosisPrescription $prescription) {
        return view('admin.lab-test.test.all.biochemical.print', compact('prescription'));
    }
    public function generateUniquePrescriptionId() {
        do {
            $uniqueId = mt_rand(1000000000, 9999999999);
        } while (LabDiognosisPrescription::where('unique_id', $uniqueId)->exists());
    
        return $uniqueId;
    }
    public function patientInfo(Request $req)
    {
        $pet = Pet::where("unique_id", $req->id)->first();

        // Target date
        $currentDate = Carbon::now();
        $parsedDate = Carbon::parse($pet->age);
        $years = $parsedDate->diffInYears($currentDate);
        $months = $parsedDate->copy()->addYears($years)->diffInMonths($currentDate);
        $pet->years = $years;
        $pet->months = $months;
        
        return response()->json(["pet" => $pet, "user" => $pet->user]);
    }
}
