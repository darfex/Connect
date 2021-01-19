<div class="border-gray-300 border rounded mt-10 p-4">
    @forelse ($posts as $post)
    <div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ $post->user->path() }}">
                <img src="{{ $post->user->avatar }}" style="width: 50px;" alt="" class="rounded-full mr-2">
            </a>
        </div>
        <div>
            <a href="{{ $post->user->path() }}">
                <h5 class="font-bold mb-3">{{ $post->user->lastname . ' ' . $post->user->firstname}}</h5>
            </a>
            <p class="text-sm">
                {{ $post->body }}
            </p>

            <div>
                <div class="mx-auto flex justify-center">
                    <img src="{{ asset($post->image) }}" alt="" class="mt-2 mx-auto">
                </div>
                <div class="flex items-center mt-3">
                    <x-like-button :post="$post" />
                    <x-delete-button :post="$post" />
                </div>
            </div>
        </div>
    </div>
    @empty
        <p class="p-4">No post yet</p>
    @endforelse
</div>