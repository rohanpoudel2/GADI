<x-layout>
    @component('components.hero')
        @slot('image')
            {{ asset('images/hero-image2.jpg') }}
        @endslot
        @slot('title')
            <h1>Look Around<br /> See what you like</h1>
        @endslot
    @endcomponent
    @component('components.cards')
    @endcomponent
</x-layout>
