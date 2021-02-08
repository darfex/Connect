<x-app>
    <div class="mx-auto">
        <div class="border-gray-300 border rounded mt-10 p-4">
            <h1 class="text-lg font-semibold mb-2">Search Result</h1>

            <ul>
                @forelse ($data as $result)
                    <li class="{{ $loop->last ? '' : 'mb-4' }} {{ $loop->last ? '' : 'border-b border-b-gray-400' }} pb-2">
                        <div>
                            <a href="{{ route('profile', $result) }}" class="flex items-center">
                                <img src="{{ $result->avatar }}" style="width: 40px; height:40px" alt="" class="rounded-full mr-2">
                                {{ $result->lastname . ' ' . $result->firstname }}
                            </a>
                        </div>
                    </li>
                @empty
                    <p>No result</p>
                @endforelse
            </ul>
        </div>
    </div>
</x-app>