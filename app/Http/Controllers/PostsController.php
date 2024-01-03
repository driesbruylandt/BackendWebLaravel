<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Vote;
use Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function showPosts()
    {    $now = Carbon::now();
        $lastSunday = $now->startOfWeek()->subDay();

        $posts = Post::where('created_at', '>=', $lastSunday)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard', ['posts' => $posts]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'cover_image' => 'image|nullable|max:1999',
        ]);
        
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('cover_images', 'public');
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->message = $request->input('message');
        $post->user_id = auth()->user()->id;
        $post->upvotes = 0;
        $post->downvotes = 0;
        $post->cover_image = $path;
        $post->save();

        return redirect('/')->with('success', 'Post added successfully!');
    }

    public function upvote(Post $post)
    {
        $userId = auth()->id();

        $vote = $post->votes()->updateOrCreate(
            ['user_id' => $userId],
            ['vote' => 1]
        );

        return back();
    }

    public function downvote(Post $post)
    {
        $vote = $post->votes()->where('user_id', auth()->id())->first();

        if ($vote) {
            $vote->update(['vote' => -1]);
        } else {
            $post->votes()->create([
                'user_id' => auth()->id(),
                'vote' => -1,
            ]);
        }

        return back();
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('cover_images', 'public');

            $post->update([
                'title' => $request->input('title'),
                'message' => $request->input('message'),
                'cover_image' => $path,
            ]);
        } else {
            $post->update($request->only('title', 'message'));
        }

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }
}
