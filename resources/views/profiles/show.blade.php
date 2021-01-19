<x-master>
    <div class="">
        <x-header :user="$user"></x-header>

        <section class="px-20">
            <main class="container mx-auto">
                <div class="lg:flex justify-between">
                    @include('_sidebar-links')

                    <div class="rounded-lg bg-white px-12 lg:w-3/5">
                        @yield('content')
                    </div>

                    @include('people')

                </div>
            </main>
        </section>
    </div>
</x-master>