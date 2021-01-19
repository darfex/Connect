<x-app :users="$users">
    <div class="mx-auto">
        <div class="border-gray-300 border rounded mt-10 p-4">
            <h1 class="text-lg font-bold mb-2">Search Result</h1>

            <ul>
                @forelse ($data as $result)
                    <li class="{{ $loop->last ? '' : 'mb-4' }} {{ $loop->last ? '' : 'border-b border-b-gray-400' }} pb-2">
                        <a href="{{ route('publications', $result->user) }}/{{ $result->id }}" class="font-semibold">{{ $result->title }}</a>
                        <p class="text-sm">{{ 'by ' . $result->user->lastname . ' ' . $result->user->firstname }}</p>
                    </li>
                @empty
                    <p>No result</p>
                @endforelse
            </ul>
        </div>
    </div>
</x-app>