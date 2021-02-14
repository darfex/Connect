<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Area;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles._profile', [
            'user' => $user
        ]);
    }
    
    public function edit(User $user)
    {
        return view('profiles.edit', [
            'user' => $user,
            'faculties' => Faculty::orderBy('name')->get(),
            'departments' => Department::orderBy('name')->get(),
            'areas' => Area::all()
        ]);
    }

    public function update(User $user)
    {
        $attributes = $this->validator();

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

    private function validator()
    {
        return request()->validate([
            'firstname' => ['string', 'required', 'max:255'],
            'lastname' => ['string', 'required', 'max:255'],
            'description' => ['string', 'nullable'],
            'department_id' => ['string'],
            'avatar' => ['file', 'mimes:png,jpg,jpeg'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore(request()->user())],
        ]);
    }
}
