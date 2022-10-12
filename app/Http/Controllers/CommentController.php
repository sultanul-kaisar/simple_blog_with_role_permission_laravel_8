<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    public function CommentIndex(){
        $comments = Comment::onlyTrashed()->latest()->get();
        return view('comments.index', compact('comments'));
    }

    public function StoreComment(Request $request){

        $blog_id =  $request->blog_id;
        $blog = Blog::where('id',$blog_id)->first();

        $request->validate([
            'name' => 'required',
            'body' => 'required',
        ],[
            'name.required' => 'Name is required',
            'body.required' => 'Comment message is required',
        ]);

        Comment::insert([
            'blog_id' => $request->blog_id,
            'name' => $request->name,
            'body' => $request->body,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->withSuccess(__('Comment successfully.'));
    }

    public function CommentInactive($id){
        Comment::find($id)->delete();
        return redirect()->back();
    }

    public function CommentActive($id){
        Comment::onlyTrashed()->find($id)->restore();
        return redirect()->back()->withSuccess(__('Comment active successfully.'));
    }


    public function CommentDelete($id){
        Comment::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->withSuccess(__('Comment deleted successfully.'));
    }
}
