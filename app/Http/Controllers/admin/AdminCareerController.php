<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class AdminCareerController extends Controller
{
    /*
    =======================
            career
    =======================
    */
    public function career()
    {
        $dataTypes = Career::latest()->get();

        return view('admin.career.index', compact('dataTypes'));
    }
    public function addCareer()
    {
        return view('admin.career.add');
    }
    public function storeCareer(Request $req)
    {
        try {
            $career = new Career();
            $career->name = $req->name;
            $career->address = $req->address;
            $career->vacancy = $req->vacancy;
            $career->details = $req->details;
            $career->form_url = $req->form_url;
            $career->save();
        
            return redirect(route('admin.career.index'))->with(['status' => true, 'msg' => 'You are successfully created a career!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.career.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editCareer(Career $career)
    {
        return view('admin.career.edit', compact('career'));
    }
    public function updateCareer(Career $career, Request $req)
    {
        try {
            $career->name = $req->name;
            $career->address = $req->address;
            $career->vacancy = $req->vacancy;
            $career->details = $req->details;
            $career->form_url = $req->form_url;
            $career->save();
        
            return redirect(route('admin.career.index'))->with(['status' => true, 'msg' => 'You are successfully updated a career!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.career.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteCareer(Career $career)
    {
        $career->delete();

        return redirect(route('admin.career.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a career!']);
    }
}
