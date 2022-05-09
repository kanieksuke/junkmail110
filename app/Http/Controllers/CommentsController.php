<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->message = $request->message;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->status = 1;
        $comment->save();

        return back();
    }
}
