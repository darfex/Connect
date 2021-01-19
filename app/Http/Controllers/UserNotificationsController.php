<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show()
    {
        return view('notifications.index',[
            'user' => auth()->user(),
            'users' => recommend_users()
        ]);
    }
}
