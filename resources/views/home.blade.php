<x-layout>
    @component('components.hero')
        @slot('image')
            {{ asset('images/hero_image.jpg') }}
        @endslot
        @slot('title')
            <h1> Make your driving<br /> more exciting</h1>
        @endslot
        @slot('desc')
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus sapiente dolor error libero quo odio porro,
                fugiat blanditiis fugit molestiae, a similique numquam provident natus, incidunt reiciendis rerum earum
                possimus?
            </p>
        @endslot
    @endcomponent
    @component('components.benefits')
    @endcomponent
    @if (isset($featured))
        @component('components.featured')
        @endcomponent
    @else
        <div class="container">
            <div class="no-featured">
                <h1 style="text-align: center; border-bottom: 1px solid gray; border-top: 1px solid gray">No Featured
                    Products to show</h1>
            </div>
        </div>
    @endif
</x-layout>
