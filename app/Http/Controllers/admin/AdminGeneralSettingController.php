<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Utils\Utils;
use App\Models\Branch;
use App\Models\GeneralSetting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class AdminGeneralSettingController extends Controller
{
    /*
    =======================
            branch
    =======================
    */
    public function branch()
    {
        $dataTypes = Branch::latest()->get();

        return view('admin.settings.branch.index', compact('dataTypes'));
    }
    public function addBranch()
    {
        return view('admin.settings.branch.add');
    }
    public function storeBranch(Request $req)
    {
        try {
            $branch = new Branch();
            $branch->name = $req->name;
            $branch->address = $req->address;
            $branch->number = $req->number;
            $branch->email = $req->email;
            $branch->save();
        
            return redirect(route('admin.branch.index'))->with(['status' => true, 'msg' => 'You are successfully created a branch!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.branch.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editBranch(Branch $branch)
    {
        return view('admin.settings.branch.edit', compact('branch'));
    }
    public function updateBranch(Branch $branch, Request $req)
    {
        try {
            $branch->name = $req->name;
            $branch->address = $req->address;
            $branch->number = $req->number;
            $branch->email = $req->email;
            $branch->save();
        
            return redirect(route('admin.branch.index'))->with(['status' => true, 'msg' => 'You are successfully updated a branch!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.branch.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteBranch(Branch $branch)
    {
        $branch->delete();

        return redirect(route('admin.branch.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a branch!']);
    }


    /*
    =======================
            SLIDER
    =======================
    */
    public function slider()
    {
        $dataTypes = Slider::latest()->get();

        return view('admin.slider.index', compact('dataTypes'));
    }
    public function addSlider()
    {
        return view('admin.slider.add');
    }
    public function storeSlider(Request $req)
    {
        try {
            $autoOrder = $req->order;
            if($autoOrder == null){
                $autoOrder = 1 + (Slider::latest()->first() !== null ? Slider::latest()->first()->order : 0);
            }

            $slider = new Slider();
            $slider->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'slider') : "placeholder.png";
            $slider->link = $req->link;
            $slider->order = $autoOrder;
            $slider->save();
        
            return redirect(route('admin.slider.index'))->with(['status' => true, 'msg' => 'You are successfully created a slider!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.slider.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editSlider(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }
    public function updateSlider(Slider $slider, Request $req)
    {
        try {
            $image = "";
            if(!empty($req->image)){
                $image = Utils::processFile($req->file('image'), 'slider');
                Storage::delete($slider->image);
            }else{
                $image = $slider->image;
            }
        
            $slider->image = $image;
            $slider->link = $req->link;
            $slider->order = $req->order;
            $slider->save();
        
            return redirect(route('admin.slider.index'))->with(['status' => true, 'msg' => 'You are successfully updated a slider!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.slider.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteSlider(Slider $slider)
    {
        if (Storage::exists($slider->image)) {
            Storage::delete($slider->image);
        }
        $slider->delete();

        return redirect(route('admin.slider.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a slider!']);
    }


    /*
    =======================
            general
    =======================
    */
    public function general()
    {
        $dataTypes = GeneralSetting::pluck('value', 'key')->toArray();
        $dataTypes = json_decode(json_encode($dataTypes));

        return view('admin.settings.general', compact('dataTypes'));
    }

    public function seo()
    {
        $dataTypes = GeneralSetting::pluck('value', 'key')->toArray();
        $dataTypes = json_decode(json_encode($dataTypes));

        return view('admin.settings.seo', compact('dataTypes'));
    }

    public function updateGeneral(Request $req)
    {
        $dataTypes = GeneralSetting::get();

        foreach ($dataTypes as $value) {
            $key = $value->key;
            if(isset($req[$key])){
                $originalValue = $req[$key];

                // favicons
                if($key == "about_cover"){
                    $originalValue = "";
                    if(!empty($req->about_cover)){
                        $originalValue = Utils::processFile($req->file('about_cover'), 'setting');
                        Storage::delete($value->value);
                    }else{
                        $originalValue = $value->value;
                    }
                }

                // favicon
                if($key == "favicon"){
                    $originalValue = "";
                    if(!empty($req->favicon)){
                        $originalValue = Utils::processFile($req->file('favicon'), 'setting');
                        Storage::delete($value->value);
                    }else{
                        $originalValue = $value->value;
                    }
                }

                // logo
                if($key == "logo"){
                    $originalValue = "";
                    if(!empty($req->logo)){
                        $originalValue = Utils::processFile($req->file('logo'), 'setting');
                        Storage::delete($value->value);
                    }else{
                        $originalValue = $value->value;
                    }
                }


                $setting = GeneralSetting::find($value->id);
                $setting->value = $originalValue;
                $setting->save();
            }
        }

        Cache::forget('general_settings');
        return back()->with(['status' => true, 'msg' => 'You are successfully update your settings!']);
    }

}
