<x-master>
    <section class="px-16">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between pt-10">

                @auth
                    @include('_sidebar')
                @endauth


                <div class="lg:flex-1 lg:mx-14" style="max-width: 700px">
                    {{ $slot }}
                </div>

                @auth
                    @include('people')
                @endauth

            </div>
        </main>

    </section>
</x-master>