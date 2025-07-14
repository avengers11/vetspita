<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Utils\Utils;
use App\Models\Pet;
use App\Models\PetSpecies;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPetsController extends Controller
{
    /*
    ===========================
            pet
    ===========================
    */
    public function pet(){
        $dataTypes = Pet::latest()->get();

        return view('admin.pet.index')->with(compact('dataTypes'));
    }
    public function petCreate(){
        $users = User::latest()->where('user_type', 'patient')->get();
        $species = PetSpecies::latest()->orderBy('order', 'DESC')->get();
        return view('admin.pet.add')->with(compact('users', 'species'));
    }
    public function petStore(Request $req){
        try {
            // Input values
            $age_year = $req->age_year;
            $age_month = $req->age_month;

            $currentDate = Carbon::now();
            $dateOfBirth = $currentDate->subYears($age_year)->subMonths($age_month);
            $dobFormatted = $dateOfBirth->format('Y-m-d');


            $pet = new Pet; 
            $pet->user_id = $req->user_id;
            $pet->name = $req->name;
            $pet->species = $req->species;
            $pet->breed = $req->breed;
            $pet->age = $dobFormatted;
            $pet->sex = $req->sex;
            $pet->unique_id = $this->generateUniquePetId();
            $pet->save();

            return redirect(route('admin.pet.index'))->with(['status' => true, 'msg' => 'You are successfully created a pet!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.pet.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function petEdit(Pet $pet){
        $users = User::latest()->where('user_type', 'patient')->get();
        $species = PetSpecies::latest()->orderBy('order', 'DESC')->get();
        
        // Target date
        $currentDate = Carbon::now();
        $parsedDate = Carbon::parse($pet->age);
        $years = $parsedDate->diffInYears($currentDate);
        $months = $parsedDate->copy()->addYears($years)->diffInMonths($currentDate);

        return view('admin.pet.edit')->with(compact('pet', 'users', 'species', 'years', 'months'));
    }
    public function petUpdate(Request $req, Pet $pet)
    {
        try {
            $age_year = $req->age_year;
            $age_month = $req->age_month;
            $currentDate = Carbon::now();
            $dateOfBirth = $currentDate->subYears($age_year)->subMonths($age_month);
            $dobFormatted = $dateOfBirth->format('Y-m-d');

            $pet->name = $req->name;
            $pet->species = $req->species;
            $pet->breed = $req->breed;
            $pet->age = $dobFormatted;
            $pet->sex = $req->sex;
            $pet->save();
    
            return redirect(route('admin.pet.index'))->with(['status' => true, 'msg' => 'You are successfully created a pet!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.pet.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function petDelete(Pet $pet){
        try {
            $pet->delete();
            return redirect(route('admin.pet.index'))->with(['status' => false, 'msg' => 'You are successfully deletes a pet!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.pet.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function petAddParents(Request $req){
        

        try {
            if(User::where('number', $req->userNumber)->exists()){
                return response()->json(['status' => false, "msg" => "This number is already used!"]);
            }

            $user = new User;
            $user->name = $req->name;
            $user->email = $req->email;
            $user->number = $req->number;
            $user->address = $req->address;
            $user->password = Hash::make($req->password);
            $user->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'users') : "placeholder.png";
            $user->user_id = $this->generateUniqueUserId();
            $user->user_type = 'patient';
            $user->save();

            return response()->json(['status' => true, "msg" => "You are successfully add a parent!", "user" => $user]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, "msg" => "error: $th"]);
        }
    }
    public function registration(User $user)
    {
        $users = User::latest()->where('user_type', 'patient')->get();
        $species = PetSpecies::latest()->orderBy('order', 'DESC')->get();

        return view('admin.pet.registration')->with(compact('user', 'users', 'species'));
    }
    public function registrationSubmit(Request $req)
    {
        // update a user 
        if(!empty($req->user_id)){
            $user = User::find($req->user_id);
            $user->name = $req->owner_name;
            $user->email = $req->owner_email;
            $user->number = $req->owner_number;
            $user->password = !empty($req->owner_password) ? $req->owner_password : $user->password;
            $user->address = $req->owner_address;
            $user->image = !empty($req->owner_image) ? Utils::processFile($req->file('owner_image'), 'users') : $user->image;
            $user->save();

            // update pets 
            if(!empty($req->ids)){
                foreach ($req->ids as $index=>$value) {
                    // Input values
                    $age_year = $req->age_year[$index];
                    $age_month = $req->age_month[$index];
    
                    $currentDate = Carbon::now();
                    $dateOfBirth = $currentDate->subYears($age_year)->subMonths($age_month);
                    $dobFormatted = $dateOfBirth->format('Y-m-d');
    
                    $pet = Pet::find($value);
                    $pet->name = $req->name[$index];
                    $pet->species = $req->species[$index];
                    $pet->breed = $req->breed[$index];
                    $pet->age = $dobFormatted;
                    $pet->sex = $req->sex[$index];
                    $pet->save();
                }
            }
            
            // add a new pet 
            if(!empty($req->pet_name)){
                $new_age_year = $req->pet_age_year;
                $new_age_month = $req->pet_age_month;
    
                $new_currentDate = Carbon::now();
                $new_dateOfBirth = $new_currentDate->subYears($new_age_year)->subMonths($new_age_month);
                $new_dobFormatted = $new_dateOfBirth->format('Y-m-d');
    
                $pet = new Pet; 
                $pet->user_id = $user->id;
                $pet->name = $req->pet_name;
                $pet->species = $req->pet_species;
                $pet->breed = $req->pet_breed;
                $pet->age = $new_dobFormatted;
                $pet->sex = $req->pet_sex;
                $pet->unique_id = $this->generateUniquePetId();
                $pet->save();
            }

            return redirect(route('admin.pet.registration', $req->user_id))->with(['status' => true, 'msg' => 'You are successfully update a patient!']);
        }else{
            // add a parents  
            $user = new User;
            $user->name = $req->owner_name;
            $user->email = $req->owner_email;
            $user->number = $req->owner_number;
            $user->address = $req->owner_address;
            $user->password = Hash::make($req->owner_password);
            $user->image = !empty($req->owner_image) ? Utils::processFile($req->file('owner_image'), 'users') : "placeholder.png";
            $user->user_id = $this->generateUniqueUserId();
            $user->user_type = 'patient';
            $user->save();

            // add a new pet 
            if(!empty($req->pet_name)){
                $age_year = $req->pet_age_year;
                $age_month = $req->pet_age_month;
    
                $currentDate = Carbon::now();
                $dateOfBirth = $currentDate->subYears($age_year)->subMonths($age_month);
                $dobFormatted = $dateOfBirth->format('Y-m-d');
    
                $pet = new Pet; 
                $pet->user_id = $user->id;
                $pet->name = $req->pet_name;
                $pet->species = $req->pet_species;
                $pet->breed = $req->pet_breed;
                $pet->age = $dobFormatted;
                $pet->sex = $req->pet_sex;
                $pet->unique_id = $this->generateUniquePetId();
                $pet->save();
            }

            return redirect(route('admin.pet.registration', $req->user_id))->with(['status' => true, 'msg' => 'You are successfully add a new patient!']);
        }

    }
    /*
    ===========================
            Category 
    ===========================
    */
    public function species(){
        $dataTypes = PetSpecies::latest()->orderBy('order', 'DESC')->get();

        return view('admin.pet.species.index')->with(compact('dataTypes'));
    }
    public function addSpecies(){
        return view('admin.pet.species.add');
    }
    public function storeSpecies(Request $req){
        try {
            $autoOrder = $req->order;
            if($autoOrder == null){
                $autoOrder = 1 + (PetSpecies::latest()->first() !== null ? PetSpecies::latest()->first()->order : 0);
            }

            $species = new PetSpecies; 
            $species->order = $autoOrder;
            $species->name = $req->name;
            $species->save();

            return redirect(route('admin.pet.species.index'))->with(['status' => true, 'msg' => 'You are successfully created a species!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.pet.species.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editSpecies(PetSpecies $species){
        return view('admin.pet.species.edit')->with(compact('species'));
    }
    public function updateSpecies(Request $req, PetSpecies $species)
    {
        try {
            $species->order = $req->order;
            $species->name = $req->name;
            $species->save();
    
            return redirect(route('admin.pet.species.index'))->with(['status' => true, 'msg' => 'You are successfully created a species!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.pet.species.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteSpecies(PetSpecies $species){
        try {
            $species->delete();
            return redirect(route('admin.pet.species.index'))->with(['status' => false, 'msg' => 'You are successfully deletes a species!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.pet.species.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }

    private function generateUniquePetId() {
        $now = now();
        $uniqueId = $now->format('ymdHi');
        while (Pet::where('unique_id', $uniqueId)->exists()) {
            $now = $now->addMinute();
            $uniqueId = $now->format('ymdHi');
        }

        return $uniqueId;
    }
    function generateUniqueUserId() {
        do {
            $uniqueId = mt_rand(1000000000, 9999999999);
        } while (\App\Models\User::where('user_id', $uniqueId)->exists());
    
        return $uniqueId;
    }
}
