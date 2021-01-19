@unless (auth()->user()->is($user))
    <div class="my-5">
        <form action="{{ route('profile', $user) }}/follow" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 rounded-full text-white shadow px-4 text-xs py-2">
                {{ auth()->user()->following($user) ? 'Unfollow' : 'Follow' }}
            </button>
        </form>
    </div>
@endunless