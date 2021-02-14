@extends('profiles.show')

@section('content')
<div class="border-gray-300 border rounded-lg mt-10 p-4">
    <form action="/publications/{{ $publication->id }}" method="POST" enctype="multipart/form-data" class="w-full">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">Title</label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" required
                value="{{ $publication->title }}">

            @error('title')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="abstract">Abstract</label>
            <textarea name="abstract" id="" rows="5"
                class="w-full border {{ $errors->has('bio') ? 'border-red-600' : 'border-gray-400' }}"
                required>{{ $publication->abstract }}</textarea>

            @error('abstract')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- <div class="mb-6">
            <embed src="{{ asset($publication->document) }}" type="file">
        </div> --}}

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="publication_file">Document</label>
            <p class="text-xs text-green-600">Upload new file</p>
            <input class="border border-gray-400 p-2 w-full" type="file" name="document" id="document"
                value="">

            @error('document')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection