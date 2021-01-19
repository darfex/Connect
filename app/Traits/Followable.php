<?php

namespace App\Traits;

use App\Models\User;

trait Followable
{
    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);
    }

    public function following(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }
}
