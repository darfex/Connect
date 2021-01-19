<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles._profile', [
            'user' => $user,
            'users' => recommend_users()
        ]);
    }
    
    public function edit(User $user)
    {
        return view('profiles.edit', [
            'user' => $user,
            'users' => recommend_users(),
            'faculties' => Faculty::orderBy('name')->get(),
            'departments' => Department::orderBy('name')->get(),
            'areas' => Area::all()
        ]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'firstname' => ['string', 'required', 'max:255'],
            'lastname' => ['string', 'required', 'max:255'],
            'bio' => ['string', 'nullable'],
            'department_id' => ['string'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);

        if(request('password') !== null)
        {
            $attributes = request()->validate([
                'password' => ['string', 'min:8', 'max:30', 'confirmed']
            ]);
            $attributes['password'] = Hash::make($attributes['password']);
        }

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        if(request('area') !== null){
            $user->areas()->attach(request('area'));
        }

        return redirect()->route('profile', $user);
    }

    public function posts(User $user)
    {
        return view('profiles.post', [
            'user' => $user,
            'users' => recommend_users(),
            'posts' => $user->posts()->withLikes()->paginate(10)
        ]);
    }
}
