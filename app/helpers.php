<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

function recommend_users()
{
    $user_department = Auth::user()->department->id;

    $friends = auth()->user()->follows->pluck('id');

    $users = User::inRandomOrder()
        ->where('department_id', $user_department)
        ->where('id', '!=', auth()->id())
        ->whereNotIn('id', $friends)
        ->get()
        ->take(5);

    return $users;
}