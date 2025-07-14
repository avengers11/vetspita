<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\LabTestPrescription;
use App\Models\Pet;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // appointment
    public function appointment(Request $request){
        $user = Auth::user();
        $pets = $user->pets;
        $doctors = User::role('doctor')->get();

        // submit  
        if($request->isMethod('POST')){
            $appointment = new Appointment();
            $appointment->user_id = $user->id;
            $appointment->patient_id = $request->pet_id;
            $appointment->doctor_id = $request->doctor_id;

            $appointment->purpose = $request->purpose;
            $appointment->date_time = $request->date_time;
            $appointment->status = 'unauthorize';
            $appointment->save();

            return redirect(route("appointment.history"))->with(['status' => true, 'msg' => 'You are successfully created appointment!']);
        }

        return view("frontend.book-appointment", compact('doctors', 'pets'));
    }

    // history
    public function history()
    {
        $user = Auth::user();
        $appointments = Appointment::latest()->where("user_id", $user->id)->get();
        return view('frontend.appointments', compact("appointments"));
    }




    /*
    ==================
    prescriptions
    ===================
    */
    public function prescriptions(Request $request){
        $user = Auth::user();
        $prescriptions = Prescription::latest()->where("user_id", $user->id)->get();

        return view('frontend.prescriptions', compact("prescriptions"));
    }

    // prescriptionView
    public function prescriptionView(Request $request, $prescription){
        $user = Auth::user();
        $prescription = Prescription::latest()->where("user_id", $user->id)->where("id", $prescription)->first();

        return view('frontend.prescription_view', compact("prescription"));
    }

    /*
    ==================
    tests
    ===================
    */
    public function tests(Request $request){
        $user = Auth::user();
        $patientIds = Pet::where("user_id", $user->id)->pluck("unique_id");
        $tests = LabTestPrescription::latest()->whereIn("patient_id", $patientIds)->get();

        return view('frontend.test_reports', compact("tests"));
    }

    // prescriptionView
    public function testView(Request $request, $test){
        $user = Auth::user();
        $patientIds = Pet::where("user_id", $user->id)->pluck("unique_id");
        $testData = LabTestPrescription::latest()->whereIn("patient_id", $patientIds)->where("id", $test)->first();

        return view('frontend.test_reports_view', compact("testData"));
    }

}
