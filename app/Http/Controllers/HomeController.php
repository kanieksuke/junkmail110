<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;

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
        $posts = Post::where('status', 1)->orderBy('updated_at', 'desc')->get();
        $search = $request->input('search');
        $posts = Post::paginate(20);
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
        $user = \Auth::user();
        return view('create', compact('user'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required']
        ];
        $this->validate($request, $rules);
        
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
        $user = \Auth::user();
        $post = Post::find($id);
        $comments = Comment::where('status', 1)->orderBy('updated_at', 'desc')->get();
        return view('show',compact('post'));
    }
}
