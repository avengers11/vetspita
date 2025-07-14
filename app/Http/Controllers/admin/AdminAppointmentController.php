<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultant;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAppointmentController extends Controller
{
    public function appointment()
    {
        $user = Auth::user();
        $dataTypes = Appointment::latest()->where("status", "!=", "unauthorize")->get();
        if($user->hasRole("Doctor")){
            $dataTypes = Appointment::latest()->where("doctor_id", $user->id)->where("status", "!=", "unauthorize")->get();
        }

        return view('admin.appointment.index', compact('dataTypes'));
    }
    public function unauthorizedAppointment()
    {
        $dataTypes = Appointment::latest()->where("status", "unauthorize")->get();
        return view('admin.appointment.index', compact('dataTypes'));
    }

    public function addAppointment(Request $request)
    {
        if($request->isMethod('POST')){
            // appoint  
            $appointment = new Appointment();
            $appointment->patient_id = $request->pet_id;
            $appointment->doctor_id = $request->doctor_id;

            $appointment->purpose = $request->purpose;
            $appointment->date_time = $request->date_time;
            $appointment->status = 'unauthorize';
            $appointment->save();

            return redirect(route('admin.appointment.index'))->with(['status' => true, 'msg' => 'You are successfully created appointment!']);
        }

        $patients = Pet::latest()->get();
        $doctors = User::role('Doctor')->get();
        return view('admin.appointment.add', compact('patients', 'doctors'));
    }

    public function editAppointment(Request $request, $appointment)
    {
        $appointment = Appointment::find($appointment);
        if($request->isMethod('POST')){
            // appoint  
            $appointment->patient_id = $request->pet_id;
            $appointment->doctor_id = $request->doctor_id;

            $appointment->purpose = $request->purpose;
            $appointment->date_time = $request->date_time;
            $appointment->save();

            return redirect(route('admin.appointment.index'))->with(['status' => true, 'msg' => 'You are successfully updated appointment!']);
        }

        $patients = Pet::latest()->get();
        $doctors = User::role('Doctor')->where("doctor_status", 1)->get();
        return view('admin.appointment.edit', compact('patients', 'doctors', 'appointment'));
    }

    public function statusAppointment(Request $request, $appointment)
    {
        $appointment = Appointment::find($appointment);
        $appointment->status = $request->status;
        $appointment->save();

        if($appointment->status == "accept"){
            return redirect(route('admin.prescription.add', ["type" => "normal", "patient_id" => $appointment->patient_id]));
        }

        return redirect(route('admin.appointment.index'))->with(['status' => true, 'msg' => 'You are successfully change status!']);
    }

    public function deleteAppointment(Request $request, Appointment $appointment)
    {
        $appointment->delete();
        return redirect(route('admin.appointment.index'))->with(['status' => true, 'msg' => 'You are successfully delete appointment!']);
    }
}
