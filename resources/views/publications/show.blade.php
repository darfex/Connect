@extends('profiles.show')

@section('content')
    <div class="border-gray-300 border rounded-md mt-10 p-4">
        @can('edit', $publication)
            <a href="{{ route('publications', $user) }}/{{ $publication->id }}/edit" class="rounded-full py-2 px-6 text-white mr-2 bg-blue-500 text-sm">Edit</a>
        @endcan
            
        <h3 class="font-bold mt-4 mb-4">{{ $publication->title }}</h3>
        <p class="text-justify mb-3 p-2">{{ $publication->abstract }}</p>
        <embed src="{{ asset($publication->document) }}" type="" width="150px" class="mb-6">
        <a href="/download/{{ $publication->id }}" target="blank" class="bg-blue-500 text-white p-3 mt-2 rounded-md">Download File</a>
    </div>
@endsection