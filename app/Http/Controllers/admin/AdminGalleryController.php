<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Utils\Utils;
use App\Models\Branch;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    /*
    =======================
            gallery
    =======================
    */
    public function gallery()
    {
        $dataTypes = Gallery::latest()->get();

        return view('admin.gallery.index', compact('dataTypes'));
    }
    public function addGallery()
    {
        $branches = Branch::get();

        return view('admin.gallery.add', compact('branches'));
    }
    public function storeGallery(Request $req)
    {
        try {
            $gallery = new Gallery();
            $gallery->type = $req->type;
            $gallery->branche_id = $req->branche_id;
            $gallery->title = $req->title;
            $gallery->description = $req->description;
            $gallery->yt_url = $req->yt_url;
            $gallery->file = !empty($req->file) ? Utils::processFile($req->file('file'), 'gallery') : "placeholder.png";
            $gallery->save();
        
            return redirect(route('admin.gallery.index'))->with(['status' => true, 'msg' => 'You are successfully created a gallery!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.gallery.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editGallery(Gallery $gallery)
    {
        $branches = Branch::get();

        return view('admin.gallery.edit', compact('gallery', 'branches'));
    }
    public function updateGallery(Gallery $gallery, Request $req)
    {
        try {
            $imgName = "";
            if(!empty($req->file)){
                $imgName = Utils::processFile($req->file('file'), 'gallery');
                Storage::delete($gallery->file);
            }else{
                $imgName = $gallery->file;
            }

            $gallery->type = $req->type;
            $gallery->branche_id = $req->branche_id;
            $gallery->title = $req->title;
            $gallery->description = $req->description;
            $gallery->yt_url = $req->yt_url;
            $gallery->file = $imgName;
            $gallery->save();
        
            return redirect(route('admin.gallery.index'))->with(['status' => true, 'msg' => 'You are successfully updated a gallery!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.gallery.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteGallery(Gallery $gallery)
    {
        $gallery->delete();

        return redirect(route('admin.gallery.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a gallery!']);
    }
}
