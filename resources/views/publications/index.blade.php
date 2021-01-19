@extends('profiles.show')

@section('content')
    <div class="border-gray-300 border rounded mt-10 p-4">
        @unless (auth()->user()->isNot($user))
            <a href="/publications/create" class="rounded-full py-2 px-4 my-2 text-white mr-2 bg-blue-500 text-sm">Add New</a>
        @endunless
        <div class="h-1/6">
            <ul class="px-4">
                @forelse ($publications as $publication)
                <li class="my-6 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
                    <a href="{{ route('publications', $user) }}/{{ $publication->id }}" class="text-lg font-semibold">{{ $publication->title }} </a>
                    <p class="text-xs">{{ 'Published on ' . date('F d Y', strtotime($publication->created_at)) }}</p>
                </li>
                    @empty
                        <p class="mt-4">No publication yet</p>
                    @endforelse
            </ul>
        </div>
    </div>
@endsection