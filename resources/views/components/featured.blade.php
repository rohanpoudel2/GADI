<section class="featured-section">
    @foreach ($featured as $feature)
        <div class="container">
            <div class="featured-product">
                <div class="top">
                    <div class="left">
                        <h1>
                            {{ $feature->tagline }}
                        </h1>
                    </div>
                    <div class="right">
                        <p>
                            {{ $feature->car->description }}
                        </p>
                    </div>
                </div>
                <div class="bottom">
                    @php
                        $image = Storage::url($feature->car->image);
                    @endphp
                    <div class="left">
                        <img src="{{ $image }}" alt="car">
                        <button class="book-button">Explore</button>
                    </div>
                    <div class="right">
                        <div class="note">
                            <img src="{{ asset('images/note.png') }}" alt="note">
                            <div class="product-specs">
                                <h1 class="product-name">{{ $feature->car->brand->name . ' ' . $feature->car->model }}
                                </h1>
                                <div class="specs">
                                    <div class="product-spec">
                                        <span>Top Speed</span>
                                        <h1>{{ $feature->car->topspeed }} KMPH</h1>
                                    </div>
                                    <div class="product-spec">
                                        <span>Interior</span>
                                        <h1>{{ $feature->car->interior }}</h1>
                                    </div>
                                    <div class="product-spec">
                                        <span>Transmission</span>
                                        <h1>{{ $feature->car->transmission }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
