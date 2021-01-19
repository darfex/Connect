<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function toggleLike(User $user)
    {
        if ($this->isLikedby($user))
        {
            $this->likes()
                ->where('user_id', $user->id)
                ->where('post_id', $this->id)
                ->delete($user);
        }else{
            $this->likes()->Create([
                'user_id' => $user ? $user->id : auth()->id()
            ]);
        }
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes()
            ->where('post_id', $this->id)
            ->count();
    }

    public function scopeWithLikes(Builder $query)
    {
         $query->leftJoinSub(
            'SELECT post_id, COUNT(post_id) likes FROM likes GROUP BY post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );
    }
}