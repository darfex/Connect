<header class="lg:h-36 mt-5">
    <div class="relative bg-blue-900 h-full flex items-center">
        <div class="absolute transform translate-y-6 translate-x-28 flex items-center">
            <img src="{{ $user->avatar }}" alt="" class="lg:w-40 rounded-full mr-4 w-0 h-40">
            <h2 class="text-2xl text-white float-right font-semibold">{{ $user->lastname . ' ' . $user->firstname }}
            </h2>
        </div>
    </div>
</header>