<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show($id){
        $user = \Auth::user();
        $posts = Post::where('user_id', $user['id'])->where('status', 1)->orderBy('updated_at', 'desc')->get();
        return view('show',compact('post'));
    }
}
