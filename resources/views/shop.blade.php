<x-layout>
    @component('components.hero')
        @slot('image')
            {{ asset('images/hero-image2.jpg') }}
        @endslot
        @slot('title')
            <h1>Look Around<br /> See what you like</h1>
        @endslot
    @endcomponent
    <section class="cards-section">
        <div class="container">
            <div class="title">
                <h1>We Offer Massive Selection of Cars</h1>
            </div>
            <div class="cards">
                @if ($cars->isEmpty())
                    No Cars Found
                @else
                    @foreach ($cars as $car)
                        @component('components.card')
                            @slot('name')
                                {{ $car->brand->name . ' ' . $car->model }}
                            @endslot
                            @slot('power')
                                {{ $car->power }}
                            @endslot
                            @slot('engine')
                                {{ $car->engine }}
                            @endslot
                            @slot('price')
                                {{ $car->price }}
                            @endslot
                            @slot('topspeed')
                                {{ $car->topspeed }}
                            @endslot
                            @slot('image')
                                {{ $car->image }}
                            @endslot
                        @endcomponent
                    @endforeach
                @endif


            </div>
            {{ $cars->links() }}
        </div>
    </section>

</x-layout>
