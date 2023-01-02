<x-layout>
    @component('components.hero')
        @slot('image')
            {{ asset('images/hero-image2.jpg') }}
        @endslot()
    @endcomponent
</x-layout>
