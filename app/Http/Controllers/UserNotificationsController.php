<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function index()
    {
        return view('notifications.index',[
            'user' => auth()->user(),
            'notifications' => tap(auth()->user()->unreadNotifications)->markAsRead()
        ]);
    }
}
