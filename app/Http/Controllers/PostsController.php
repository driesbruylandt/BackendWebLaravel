<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use Auth;
class PostsController extends Controller
{
    public function showPosts(){
        $posts = Posts::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard', ['posts' => $posts]);
    }
}
