<x-master>
    <div class="mx-auto my-12 px-8 pt-12 pb-8 box-border shadow-lg w-1/3 bg-white">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h1 class="text-2xl text-gray-600 mb-6 capitalize">Join our community today</h1>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="lastname">Lastname</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="lastname" id="lastname"
                    value="{{ old('lastname') }}" required>

                @error('lastname')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="firstname">Firstname</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="firstname" id="firstname"
                    value="{{ old('firstname') }}" required>

                @error('firstname')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">email</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="email" id="email"
                    value="{{ old('email') }}" required>

                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="mb-2 uppercase font-bold text-sm text-gray-700" for="department_id">Department</label>
                <select name="department_id" id="department_id" class="border-2 border-gray-400 rounded-md w-full p-2" onchange="">
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
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>

                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirm">Confirm
                    Password</label>
                <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation"
                    id="password_confirm" required>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-500 text-white rounded py-3 px-4 hover:bg-blue-600 w-full">
                    Register
                </button>
            </div>
        </form>
    </div>
</x-master>