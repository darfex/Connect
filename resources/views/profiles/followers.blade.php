@extends('profiles.show')

@section('content')
<div class="mt-20 border border-gray-200 rounded-lg p-4">
    <ul>
        @forelse ($followers as $follower)
            <li class="{{ $loop->last ? '' : 'mb-4' }} text-sm">
                <div>
                    <a href="{{ route('profile', $follower) }}" class="flex items-center text-sm">
                        <img src="/images/default-avatar.jpeg" style="width: 40px;" alt="" class="rounded-full mr-2">
                        {{ $follower->lastname . ' ' . $follower->firstname }}
                    </a>
                </div>
            </li>
        @empty
            <li class="text-sm">No friends yet!</li>
        @endforelse

        {{ $followers->links() }}
    </ul>
</div>
@endsection