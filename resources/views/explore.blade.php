<x-app :users="$users">
    <div class="mx-auto border border-gray-200 rounded-lg">
        @foreach ($people as $person)
        <div class="border-b border-gray-400 p-4">
            <a href="{{ $person->path() }}" class="flex items-center mb-5">
                <img src="{{ $person->avatar }}" alt="{{ $person->username }}'s avatar" class="mr-4 rounded-full"
                    width="50px">

                <div>
                    <h4 class="font-bold">{{ $person->lastname . ' ' . $person->firstname }}</h4>
                    <p class="text-xs">{{ $person->department->name }}</p>
                </div>
            </a>
        </div>
        @endforeach

        {{ $people->links() }}
    </div>
</x-app>