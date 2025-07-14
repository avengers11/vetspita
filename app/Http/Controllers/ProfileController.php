<?php

namespace App\Http\Controllers;

use App\Http\Utils\Utils;
use App\Models\Pet;
use App\Models\PetSpecies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // profile
    public function profile(Request $request){
        $user = Auth::user();
        if($request->isMethod("POST")){
            $imgName = "";
            if(!empty($request->image)){
                $imgName = Utils::processFile($request->file('image'), 'users');
                Storage::delete($user->image);
            }else{
                $imgName = $user->image;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->number = $request->number;
            $user->image = $imgName;
            $user->save();

            return back()->with(['status' => true, 'msg' => 'Your profile information, successfully updated!']);
        }

        return view('frontend.my_profile', compact('user'));
    }
    
    /*
    ======================
    PET
    ======================
    */
    public function pet()
    {
        $user = Auth::user();
        $pets = Pet::latest()->where("user_id", $user->id)->get();
        return view('frontend.my_pets', compact('pets'));
    }
    public function petAdd(Request $request)
    {
        if($request->isMethod("POST")){
            $user = Auth::user();

            // Input values
            $age_year = $request->age_year;
            $age_month = $request->age_month;
            $currentDate = Carbon::now();
            $dateOfBirth = $currentDate->subYears($age_year)->subMonths($age_month);
            $dobFormatted = $dateOfBirth->format('Y-m-d');

            $pet = new Pet; 
            $pet->user_id = $user->id;
            $pet->image = !empty($request->image) ? Utils::processFile($request->file('image'), 'pets_img') : "pets/placeholder.png";
            $pet->name = $request->name;
            $pet->name = $request->name;
            $pet->species = $request->species;
            $pet->breed = $request->breed;
            $pet->sex = $request->sex;
            $pet->vaccinated = $request->vaccinated;
            $pet->vaccine_date = $request->vaccine_date;
            $pet->age = $dobFormatted;
            $pet->unique_id = $this->generateUniquePetId();
            $pet->save();

            return redirect(route('pet'))->with(['status' => true, 'msg' => 'You are successfully created a pet!']);
        }
        $species = PetSpecies::latest()->get();

        return view('frontend.add_pet', compact('species'));
    }
    public function petDetails(Request $request, $pet)
    {
        $user = Auth::user();
        $pet = Pet::where("id", $pet)->where("user_id", $user->id)->first();
        // Target date
        $currentDate = Carbon::now();
        $parsedDate = Carbon::parse($pet->age);
        $years = $parsedDate->diffInYears($currentDate);
        $months = $parsedDate->copy()->addYears($years)->diffInMonths($currentDate);

        if($request->isMethod("POST")){
            // Input values
            $age_year = $request->age_year;
            $age_month = $request->age_month;
            $currentDate = Carbon::now();
            $dateOfBirth = $currentDate->subYears($age_year)->subMonths($age_month);
            $dobFormatted = $dateOfBirth->format('Y-m-d');

            $imgName = "";
            if(!empty($request->image)){
                $imgName = Utils::processFile($request->file('image'), 'pets_img');
                Storage::delete($user->image);
            }else{
                $imgName = $pet->image;
            }

            $pet->image = $imgName;
            $pet->name = $request->name;
            $pet->name = $request->name;
            $pet->species = $request->species;
            $pet->breed = $request->breed;
            $pet->sex = $request->sex;
            $pet->vaccinated = $request->vaccinated;
            $pet->vaccine_date = $request->vaccine_date;
            $pet->age = $dobFormatted;
            $pet->save();

            return redirect(route('pet'))->with(['status' => true, 'msg' => 'You are successfully created a pet!']);
        }
        $species = PetSpecies::latest()->get();

        return view('frontend.pet_details', compact('species', 'pet', 'years', 'months'));
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

}
