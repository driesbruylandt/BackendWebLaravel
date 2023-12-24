<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use Auth;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["index"]);
    }
    public function index()
    {
        $posts = Posts::orderBy("created_at", "desc")->get();
        return view("posts.index", compact("posts"));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|min:3|max:255",
            "message" => "required|min:20|max:255",
        ]);

        $post = new Posts();
        $post->title = $validated['title'];
        $post->message = $validated['message'];
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route("posts.index")->with("status", "Post created successfully.");
    }
}
