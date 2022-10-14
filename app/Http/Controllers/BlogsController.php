<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        $hiddenBlogs = Blog::onlyTrashed()->get();

        return view('blogs.index', compact('blogs', 'hiddenBlogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Blog::create(array_merge($request->only('title', 'body'),[
            'user_id' => auth()->id()
        ]));

        return redirect()->route('home.index')
            ->withSuccess(__('Blog created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $comments = Comment::where('blog_id', $blog->id)->get();
        $blogs = Blog::latest()->take(5)->get();
        return view('blogs.show', compact('blogs', 'comments'), [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->only('title', 'body'));

        return redirect()->route('blogs.index')
            ->withSuccess(__('Blog updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->forceDelete();

        return redirect()->route('blogs.index')
            ->withSuccess(__('Blog deleted successfully.'));
    }

    public function inactive(Request $request, $id)
    {
        $blog = Blog::find($id)->delete();

        return redirect()->route('home.index')
            ->withSuccess(__('Blog hide successfully.'));
    }

    public function active($id){
        Blog::withTrashed()->find($id)->restore();

        return redirect()->route('blogs.index')
            ->withSuccess(__('Blog activated successfully.'));
    }


}
