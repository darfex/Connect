<?php

namespace App\Models;

use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Likeable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}