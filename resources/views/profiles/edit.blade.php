@extends('profiles.show')

@section('content')
<div class="mt-10">
    <form action="/profile/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="w-full border border-gray-100 p-4 rounded-lg">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label for="firstname" class=" mb-2 uppercase font-bold text-sm text-gray-700">Firstname</label>
            <input type="text"
                class="border-2 p-2 w-full rounded-md {{ $errors->has('firstname') ? 'border-red-600' : 'border-gray-400'}}"
                name="firstname" id="firstname" value="{{ $user->firstname }}">

            @error('firstname')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="lastname" class="block mb-2 uppercase font-bold text-sm text-gray-700">Lastname</label>
            <input type="text"
                class="border-2 p-2 w-full rounded-md {{ $errors->has('lastname') ? 'border-red-600' : 'border-gray-400'}}"
                name="lastname" id="lastname" value="{{ $user->lastname }}">

            @error('lastname')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="description">Description</label>
            <textarea name="description" id="description"
                class="w-full border-2 rounded-md {{ $errors->has('description') ? 'border-red-600' : 'border-gray-400' }}">{{ $user->description }}</textarea>

            @error('bio')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- <div class="mb-6">
            <label class="mb-2 uppercase font-bold text-sm text-gray-700" for="faculty">Faculty</label>
            <select name="faculty" id="faculty" class="border-2 border-gray-400 rounded-md w-full p-2">
                <option value="" disabled selected>Select an option</option>
                @foreach ($faculties as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>

            @error('faculty')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div> --}}

        <div class="mb-6">
            <label class="mb-2 uppercase font-bold text-sm text-gray-700" for="department_id">Department</label>
            <select name="department_id" id="department_id" class="border-2 border-gray-400 rounded-md w-full p-2"
                onchange=""
            >
                <option value="" disabled selected>Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach

            </select>

            @error('department_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="area">Focus Area</label>
            <ul class="text-sm text-gray-600 mb-2">
                @forelse ($user->areas as $area)
                    <div class="flex">
                        <li class="mr-2">{{ $area->name }}</li>
                        <a href="/area/{{ $user->id }}/{{ $area->id }}" class="text-gray-600 hover:text-black">x</a>
                    </div>
                @empty
                    
                @endforelse
            </ul>    
        
            <select 
                name="area[]" 
                id="area[]" 
                class="border-2 border-gray-400 rounded-md w-full p-2 area"
                multiple="multiple"
                size="1"
            >
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                    @endforeach
            </select>
        
            @error('')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="avatar" class="block mb-2 uppercase font-bold text-sm text-gray-700">Profile Picture</label>

            <div class="flex">
                <input type="file" class="{{ $errors->has('avatar') ? 'border-red-600' : 'border-gray-400'}}"
                    name="avatar" id="avatar" value="">
            </div>

            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-sm text-gray-700">Email</label>
            <input type="email"
                class="border-2 rounded-md p-2 w-full {{ $errors->has('email') ? 'border-red-600' : 'border-gray-400'}}"
                name="email" id="email" value="{{ $user->email }}">

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-sm text-gray-700">Password</label>
            <input type="password"
                class="border-2 rounded-md p-2 w-full {{ $errors->has('password') ? 'border-red-600' : 'border-gray-400'}}"
                name="password" id="password">

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_comfirm" class="block mb-2 uppercase font-bold text-sm text-gray-700">Confirm
                Password</label>
            <input type="password" class="border-2 rounded-md border-gray-400 p-2 w-full" name="password_confirmation"
                id="password_confirm">

            @error('password_comfirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 rounded-lg px-4 py-2 text-white hover:bg-blue-500">Submit</button>
        </div>

    </form>
</div>
@endsection