@extends('profiles.show')

@section('content')

@can('edit', $user)
    <div class="my-5">
        <a href="{{ route('profile', $user) }}/edit" class="rounded-full py-2 px-4 text-white text-xs mr-2 bg-blue-500">Edit
            Profile</a>
    </div>
@endcan

<x-follow-button :user="$user"></x-follow-button>

<p class="">
    {{ $user->bio }}
</p>

<div class="mt-4 shadow-md p-4 border border-gray-200 rounded-lg text-gray-800 mb-10">
    <div class="mb-6">
        <h1 class="">About</h1>
        <hr class="mb-4">
        <p class="text-gray-500 mb-3">{{ 'Faculty: ' . $user->department->faculty->name }}</p>
        <p class="text-gray-500 mb-3">{{ 'Department: ' .  $user->department->name }}</p>
        <div class="mb-3">
            <p class="text-gray-500">Focus Area</p>
            <ul class="list-disc text-sm ml-8">
                @forelse ($user->areas as $area)
                    <li>{{ $area->name }}</li>
                @empty
                    <p>-</p>
                @endforelse
            </ul>
        </div>

    </div>

    <div>
        <h1>Contact</h1>
        <hr class="mb-4">

        <p class="text-gray-500 mb-3">{{ 'Email: ' . $user->email }}</p>
    </div>
</div>
@endsection