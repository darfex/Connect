@extends('profiles.show')

@section('content')
<div class="mt-20 border border-gray-200 rounded-lg p-4">
    <ul>
        @forelse ($data as $following)
        <li class="{{ $loop->last ? '' : 'mb-4' }} text-sm">
            <div>
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                    <img src="/images/default-avatar.jpeg" style="width: 40px;" alt="" class="rounded-full mr-2">
                    {{ $following->lastname . ' ' . $following->firstname }}
                </a>
            </div>
        </li>
        @empty
        <li class="text-sm">No friends yet!</li>
        @endforelse

        {{ $data->links() }}
    </ul>
</div>
@endsection