<div class="mt-10 lg:w-60 rounded-lg bg-blue-50 border border-blue-200 p-4 h-1/6">
    <h1 class="text-xl text-gray-500 font-semibold mb-4">People you may Know</h1>
    <ul>
        @forelse ($users as $user)
        <li class="{{ $loop->last ? '' : 'mb-4' }} text-sm">
            <div>
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                    <img src="{{ $user->avatar }}" style="width: 40px;" alt="" class="rounded-full mr-2">
                    {{ $user->lastname . ' ' . $user->firstname }}
                </a>
            </div>
        </li>
        @empty
        <li class="text-sm"></li>
        @endforelse
    </ul>
</div>