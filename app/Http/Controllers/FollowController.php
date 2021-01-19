<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function followings(User $user)
    {
        return view('profiles.following', [
            'user' => $user,
            'followings' => $user->follows()->paginate(15),
            'users' => recommend_users()
        ]);
    }

    public function followers(User $user)
    {
        return view('profiles.followers',[
            'user' => $user,
            'followers' => $user->followers()->paginate(15),
            'users' => recommend_users()
        ]);
    }

    public function store(User $user)
    {
        auth()->user()->toggleFollow($user);

        if(auth()->user()->following($user)){
            return back()
                ->with('message', "You have followed @$user->username");
        }
        return back()
            ->with('message', "You have unfollowed @$user->username");
    }
}
