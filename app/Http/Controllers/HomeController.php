<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('home.index', compact('blogs'));
    }

    public function details($id){
        $blog = Blog::find($id);
        $comments = Comment::where('blog_id', $blog->id)->get();
        $blogs = Blog::latest()->take(5)->get();
        return view('home.blog_details', compact('blog', 'blogs', 'comments'));
    }




}
