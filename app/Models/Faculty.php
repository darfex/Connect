<?php

namespace App\Models;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->hasManyThrough(User::class, Department::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
