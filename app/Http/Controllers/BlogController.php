<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //blog
    public function blogs(Request $req)
    {
        $blogs = Post::latest()->paginate(10);
        $categories = PostCategory::latest()->get();
        $recentPosts = Post::latest()->take(3)->get();

        // filter by category 
        if(isset($req->category)){
            $blogs = Post::latest()->where('category_id', $req->category)->paginate(100);
        }

        return view('frontend.blogs', compact('blogs', 'categories', 'recentPosts'));
    }

    //details
    public function details(Post $blog, Request $req)
    {
        $categories = PostCategory::latest()->get();
        $recentPosts = Post::latest()->take(3)->where('id', '!=', $blog->id)->get();

        $postView = $req->session()->get("post_view_$blog->id");
        if(empty($postView)){
            $req->session()->put("post_view_$blog->id", time());
            $blog->view = $blog->view + 1;
            $blog->save();
        }

        return view('frontend.blog_details', compact('blog', 'categories', 'recentPosts'));
    }
}
