<section class="cards-section">
    <div class="container">
        <div class="title">
            <h1>We Offer Massive Selection of Cars</h1>
        </div>
        <div class="cards">
            @foreach ($cars as $car)
                @component('components.card')
                    @slot('car')
                        {{ $car }}
                    @endslot
                @endcomponent
            @endforeach
        </div>
    </div>
</section>
