<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Department;
use App\Traits\Followable;
use App\Models\DepartmentUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'firstname',
    //     'lastname',
    //     'email',
    //     'password',
    //     'faculty',
    //     'department',
    //     'avatar',
    //     'bio',
    //      'department_id'
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function path($append = '')
    {
        $path = route('profile', $this);

        return $append ? "$path/{$append}" : $path;
    }

    public function getAvatarAttribute($value)
    {
        return asset($value ?: '/images/default-avatar.jpeg');
    }

    public function getPublication_fileAttribute($value)
    {
        return asset($value);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function timeline()
    {
        $friends = $this->follows->pluck('id');

        return Post::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->paginate(50);
    }
}
