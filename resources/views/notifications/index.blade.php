@extends('profiles.show')

@section('content')
    <div class="border-gray-300 border rounded-md mt-10 p-4">
        @forelse ($notifications as $notification)
            <li class="{{ $loop->last ? '' : 'mb-2' }} ml-2">
                @if ($notification->type === 'App\Notifications\NewPublication')
                    {{ $notification->data['user'] }} has a new publication.
                @endif
            </li>
        @empty
            <p>You have no unread notifications</p>
        @endforelse
    </div>
@endsection