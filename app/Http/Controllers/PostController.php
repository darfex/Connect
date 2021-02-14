<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{   
    public function index(User $user)
    {
        return view('profiles.post', [
            'user' => $user,
            'posts' => $user->posts()->withLikes()->paginate(10)
        ]);
    }
    
    public function delete(Post $post)
    {
        $post->delete();

        return back()
            ->with('message', 'Post Deleted');
    }

    public function store(CreatePostRequest $request)
    {
        $request->image !== null ? $image = $request->image->store('posts') : $image = null;

        Post::create([
            'user_id' => $request->user()->id,
            'body' => $request->body,
            'image' => $image
        ]);

         return redirect()->route('home');
    }
}