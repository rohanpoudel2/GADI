<section class="big-product-section">
    <div class="container">
        <div class="bigproduct">
            <div class="product-title">
                <img src="{{ Storage::url($car->brand->image) }}" alt="brandLogo">
                <h1>{{ $car->brand->name . ' ' . $car->model }}</h1>
            </div>
            <div class="product-image">
                <img src={{ Storage::url($car->image) }} alt="product">
            </div>
            <div class="product-desc">
                <h1>Know More About the Car</h1>
                <p>
                    {{ $car->description }}
                </p>
            </div>
            <div class="product-spec">
                <h1>Car Specs</h1>
                <div class="specs">
                    <div class="spec">
                        <span>Type:</span>
                        {{ $car->type }}
                    </div>
                    <div class="spec">
                        <span>Made Year:</span>
                        {{ $car->year }}
                    </div>
                    <div class="spec">
                        <span>Engine Type:</span>
                        {{ $car->engine }}
                    </div>
                    <div class="spec">
                        <span>Power (HP):</span>
                        {{ $car->power }}
                    </div>
                    <div class="spec">
                        <span>TopSpeed (KMPH):</span>
                        {{ $car->topspeed }}
                    </div>
                    <div class="spec">
                        <span>Interior:</span>
                        {{ $car->interior }}
                    </div>
                    <div class="spec">
                        <span>Transmission:</span>
                        {{ $car->transmission }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.productconfirmation', ['car' => $car])
</section>
