<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function followings(User $user)
    {
        return view('profiles.follow', [
            'user' => $user,
            'data' => $user->follows()->paginate(15),
        ]);
    }

    public function followers(User $user)
    {
        return view('profiles.follow',[
            'user' => $user,
            'data' => $user->followers()->paginate(15),
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

    public function connections(User $user)
    {
        $connections = $user->follows;
        $connections->push($user->followers)->collapse();
    
    }
}
