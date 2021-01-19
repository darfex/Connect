<x-master>

    <div class="mx-auto my-12 px-8 pt-12 pb-8 box-border shadow-lg w-1/3 bg-white">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h1 class="text-2xl text-gray-600 mb-6">Welcome</h1>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="email" id="email" required>

                @error('email')
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

            <div class="mb-6 items-center">
                <input type="checkbox" name="remember" id="remember">
                <label class="uppercase font-bold text-xs text-gray-700" for="remember"
                    {{ old('remember') ? 'checked' : '' }}>Remember me</label>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-500 text-white rounded py-3 px-4 hover:bg-blue-600 w-full">
                    Login
                </button>
            </div>

            <a class="text-sm text-blue-500 hover:text-blue-700" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </form>
    </div>

</x-master>