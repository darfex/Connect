<div class="lg:w-60 shadow p-2 rounded-lg h-1/6">
    <div>
        <a href="{{ route('profile', auth()->user()) }}" class="flex items-center text-sm">
            <img src="{{ auth()->user()->avatar }}" style="width: 40px;" alt="" class="rounded-full mr-2">
            <p class="font-bold">{{ auth()->user()->lastname . ' ' . auth()->user()->firstname }}</p>
        </a>
    </div>
    <div>
        {{-- <a href="" class="text-sm block m-2 text-blue-600">Feed</a>
        <a href="/connections/{{ auth()->user()->id }}" class="text-sm block m-2 text-blue-600">Connections</a> --}}
    </div>
</div>