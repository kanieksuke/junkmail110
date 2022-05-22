<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = \Auth::user();
        $posts = Post::where('status', 1)->orderBy('updated_at', 'desc')->get();
        $search = $request->input('search');
        // $posts = Post::paginate(20);
        $query = Post::query();
        if ($search) {
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $value) {
                $query->where('title', 'like', '%'.$value.'%')
                    ->orWhere('content', 'like', '%'.$value.'%');
            }
            $posts = $query->orderBy('updated_at', 'desc')->paginate(20);
        }
        return view('index')->with(['posts' => $posts, 'search' => $search]);
    }

    public function create()
    {
        if (Auth::check()) {
            $user = \Auth::user();
            return view('create', compact('user'));
        } else {
            return redirect('/login');
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required']
        ];
        $this->validate($request, $rules);
        
        $post = new Post;
        $uploadImage = $post->image = $request->file('image');
        $path = Storage::disk('s3')->putFile('/junkmail110', $uploadImage, 'public');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image = Storage::disk('s3')->url($path);
        $post->user_id = Auth::user()->id;
        $post->status = 1;
        $post->save();

        return redirect()->route('home');
    }

    public function show($id){
        $user = \Auth::user();
        $post = Post::find($id);
        $comments = Comment::where('status', 1)->orderBy('updated_at', 'desc')->get();
        return view('show',compact('post'));
    }

    public function edit($id){
        $user = \Auth::user();
        $post = Post::where('status', 1)->where('id', $id)->where('user_id', $user['id'])
            ->first;
        return view('edit',compact('post'));
    }
}
