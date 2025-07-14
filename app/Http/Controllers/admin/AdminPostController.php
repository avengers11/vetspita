<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Utils\Utils;
use App\Models\Package;
use App\Models\Plan;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    /*
    =======================
            PRODUCTS
    =======================
    */
    public function post()
    {
        $dataTypes = Post::latest()->get();

        return view('admin.post.index', compact('dataTypes'));
    }
    public function addPost()
    {
        $categories = PostCategory::latest()->get();
        return view('admin.post.add', compact('categories'));
    }
    public function storePost(Request $req)
    {
        try {
       
            $post = new Post();
            $post->category_id = $req->category_id;
            $post->title = $req->title;
            $post->description = $req->description;
            $post->image = !empty($req->image) ? Utils::processFile($req->file('image'), 'post') : "placeholder.png";
            $post->save();
        
            return redirect(route('admin.post.index'))->with(['status' => true, 'msg' => 'You are successfully created a post!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.post.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editPost(Post $post)
    {
        $categories = PostCategory::latest()->get();

        return view('admin.post.edit', compact('categories', 'post'));
    }
    public function updatePost(Post $post, Request $req)
    {
        try {
            $image = "";
            if(!empty($req->image)){
                $image = Utils::processFile($req->file('image'), 'post');
                Storage::delete($post->image);
            }else{
                $image = $post->image;
            }
        
            $post->category_id = $req->category_id;
            $post->title = $req->title;
            $post->description = $req->description;
            $post->image = $image;
            $post->save();
        
            return redirect(route('admin.post.index'))->with(['status' => true, 'msg' => 'You are successfully updated a post!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.post.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deletePost(Post $post)
    {
        if (Storage::exists($post->image)) {
            Storage::delete($post->image);
        }
        $post->delete();

        return redirect(route('admin.post.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a post!']);
    }


    /*
    =======================
            CATEGORY
    =======================
    */
    public function category()
    {
        $dataTypes = PostCategory::latest()->get();

        return view('admin.post.category.index', compact('dataTypes'));
    }
    public function addCategory()
    {
        $categories = PostCategory::latest()->get();
        return view('admin.post.category.add', compact('categories'));
    }
    public function storeCategory(Request $req)
    {
        try {
       
            $post = new PostCategory();
            $post->name = $req->name;
            $post->description = $req->description;
            $post->save();
        
            return redirect(route('admin.post.category.index'))->with(['status' => true, 'msg' => 'You are successfully created a post category!']);
        } catch (\Throwable $th) {
            return $th;
            return redirect(route('admin.post.category.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function editCategory(PostCategory $category)
    {
        return view('admin.post.category.edit', compact('category'));
    }
    public function updateCategory(PostCategory $category, Request $req)
    {
        try {
            $category->name = $req->name;
            $category->description = $req->description;
            $category->save();
        
            return redirect(route('admin.post.category.index'))->with(['status' => true, 'msg' => 'You are successfully updated a post!']);
        } catch (\Throwable $th) {
            return redirect(route('admin.post.category.index'))->with(['status' => false, 'msg' => 'Error Type: '.$th]);
        }
    }
    public function deleteCategory(PostCategory $category)
    {
        $category->delete();

        return redirect(route('admin.post.category.index'))->with(['status' => true, 'msg' => 'You are successfully deleted a post!']);
    }
}
