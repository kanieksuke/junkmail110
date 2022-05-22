<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class UsersController extends Controller
{
    public function my_page($id){
        $user = \Auth::user();
        $posts = Post::where('user_id', $user['id'])->where('status', 1)->orderBy('updated_at', 'desc')->get();
        return view('my_page',compact('posts'));
    }
}
