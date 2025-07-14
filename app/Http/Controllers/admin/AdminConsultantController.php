<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Utils\Utils;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminConsultantController extends Controller
{
    /*
    =======================
            consultant
    =======================
    */
    public function consultant()
    {
        $dataTypes = Consultant::latest()->get();

        return view('admin.consultant.index', compact('dataTypes'));
    }
    public function addConsultant()
    {
        return view('admin.consultant.add');
    }
    public function storeConsultant(Request $req)
    {
        try {
            $consultant = new Consultant();
            $consultant->name = $req->name;
            $consultant->address = $req->address;
            $consultant->phone = $req->phone;
            $consultant->email = $req->email;
            $consultant->phone = $req->phone;
            $consultant->description = $req->description;
            $consultant->designation = $req->designation;
            $consultant->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'consultant') : "placeholder.png";
            $consultant->save();
        
            return redirect(route('admin.consultant.index'))->with(['status' => true, 'msg' => 'You are successfully created a consultant!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.consultant.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editConsultant(Consultant $consultant)
    {
        return view('admin.consultant.edit', compact('consultant'));
    }
    public function updateConsultant(Consultant $consultant, Request $req)
    {
        try {
            $imgName = "";
            if(!empty($req->image)){
                $imgName = Utils::processFile($req->file('image'), 'consultant');
                Storage::delete($consultant->image);
            }else{
                $imgName = $consultant->image;
            }

            $consultant->name = $req->name;
            $consultant->address = $req->address;
            $consultant->phone = $req->phone;
            $consultant->email = $req->email;
            $consultant->phone = $req->phone;
            $consultant->designation = $req->designation;
            $consultant->description = $req->description;
            $consultant->image = $imgName;
            $consultant->save();
        
            return redirect(route('admin.consultant.index'))->with(['status' => true, 'msg' => 'You are successfully updated a consultant!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.consultant.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteConsultant(Consultant $consultant)
    {
        $consultant->delete();

        return redirect(route('admin.consultant.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a consultant!']);
    }
}
