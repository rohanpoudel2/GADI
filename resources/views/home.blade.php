<x-layout>
    @component('components.hero')
        @slot('image')
            {{ asset('images/hero_image.jpg') }}
        @endslot()
    @endcomponent
    @component('components.benefits')
    @endcomponent
    @component('components.featured')
    @endcomponent
</x-layout>
