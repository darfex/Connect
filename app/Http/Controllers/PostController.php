<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{   
    public function delete(Post $post)
    {
        $post->delete();

        return back()
            ->with('message', 'Post Deleted');
    }

    public function store()
    {
        $attributes = request()->validate([
            'body' => ['required', 'max:280'],
            'image' => ['file']
        ]);

        request('image') != null ? $image = request('image')->store('posts') : $image = null;


        Post::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'image' => $image
        ]);

         return redirect()->route('home');
    }
}
