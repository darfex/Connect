<div class="border-2 border-blue-600 rounded-lg px-8 py-6">
    <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="body" id="body" class="w-full border border-blue-100 rounded-lg p-2"
            placeholder="What's happening?" maxlength="280" required onKeyup="textCounter()"></textarea>
        <span id="counter" class="text-xs text-gray-400 float-right rounded-full p-1">280</span>
        <input type="file" class="text-blue-500 text-xs" name="image" id="image">

        <hr class="my-2">

        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}" style="width: 40px;" alt="Avatar" class="rounded-full mr-2">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white text-xs rounded-full px-4 py-2">Post</button>
        </footer>
    </form>

    @error('image')
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

    @error('body')

    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>