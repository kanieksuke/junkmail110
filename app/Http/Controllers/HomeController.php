<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('status', 1)->orderBy('updated_at', 'desc')->get();
        return view('index', compact('posts'));
    }

    public function create()
    {
        $user = \Auth::user();
        return view('create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $post_id = Post::insertGetId([
            'title' => $data['title'], 'content' => $data['content'], 'image' => $data['image'], 'user_id' => $data['userId'], 'status' => 1
        ]);

        if($request->image->extension() == 'gif'
        || $request->image->extension() == 'jpeg'
        || $request->image->extension() == 'jpg'
        || $request->image->extension() == 'png')

        {
        $request->file('image')
        ->storeAs('public/image', $post_id.'.'.$request->image->extension());
        }
        return redirect()->route('home');
    }

    public function show($id){
        $post = Post::find($id);
        return view('show',compact('post'))->with('post',$post);
    }
}
