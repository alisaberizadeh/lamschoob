<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $new_comments = Comment::where("active","0")->orderBy("id","DESC")->get();
        $comments = Comment::where("active","1")->orderBy("id","DESC")->get();
        return view('dashboard.comments.home', [
            'new_comments' => $new_comments,
            'comments' => $comments,
        ]);
    }
    public function active($id)
    {
         $comment = Comment::where("id",$id)->first();
         $comment->update([
            'active' => 1
         ]);
         return redirect()->back()->with('success', ' دیدگاه فعال شد');
    }
    public function delete($id)
    {
         $comment = Comment::where("id",$id)->first();
         $comment->delete();
         return redirect()->back()->with('success', ' دیدگاه حذف شد');
    }
}
