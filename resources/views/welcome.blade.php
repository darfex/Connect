<x-master>
    <div>
        <div class="container flex px-28 py-16 items-center justify-between bg-blue-50 h-screen">
            <img src="{{ asset('/images/header.png') }}" alt="" class="w-3/5">

            <div>
                <h1 class="text-3xl text-center mb-3">UI<br>Research<br>Management System</h1>
                <a href="{{ route('register') }}">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-32 rounded-lg">Join</button>
                </a>
            </div>
        </div>

        <div class="flex px-60 items-center justify-between mb-20">
            <img src="{{ asset('/images/display.png') }}" alt="" class="w-96">

            <div>
                <h1>
                    <h1 class="text-3xl text-center mb-3">Discover knowledge</h1>
                    <p class="text-center">Stay up to date with what's happening in your field</p>
                </h1>
            </div>
        </div>

        <div class="flex px-60 items-center justify-between">
            <img src="{{ asset('/images/display_2.png') }}" alt="" class="w-96">

            <div>
                <h1>
                    <h1 class="text-3xl text-center mb-3">Collaborate with Your Peers</h1>
                    <p class="text-center">Connect with other researchers in your field</p>
                </h1>
            </div>
        </div>
    </div>
</x-master>