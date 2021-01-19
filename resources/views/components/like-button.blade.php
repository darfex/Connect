<div class="flex">
    <form action="/posts/{{ $post->id }}/like" method="POST">
        @csrf
        <div class="flex items-center mr-4 {{ $post->isLikedBy(auth()->user()) ? 'text-red-600' : 'text-gray-500' }}">
            <button type="submit">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24"
                    class="w-5 h-5 mr-1 {{ $post->isLikedBy(auth()->user()) ? 'fill-current' : '' }}">
                    <path
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </button>
            <span class="text-sm">{{ $post->likes ?: '0' }}</span>
        </div>
    </form>
</div>