<?php

use App\Models\User;

function recommend_users()
{
    $user_department = auth()->user()->department->id;

    $user_area = auth()->user()->areas->pluck('name');

    $friends = auth()->user()->follows->pluck('id');

    $users = User::inRandomOrder()
        ->where('department_id', $user_department)
        ->where('id', '!=', auth()->id())
        ->whereNotIn('id', $friends)
        ->get()
        ->take(5);

    return $users;
}