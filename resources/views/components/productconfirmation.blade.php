<section class="product-confirmation">
    <div class="container">
        <div class="product-confirm">
            <div class="product">
                <div class="product-image">
                    <img src="{{ Storage::url($car->image) }}" alt="product">
                </div>
                <div class="product-spe">
                    <div class="product-title">
                        <img src="{{ Storage::url($car->brand->image) }}" alt="">
                        <h1>
                            {{ $car->brand->name . ' ' . $car->model }}
                        </h1>
                    </div>
                    <div class="product-color">
                        <span>Price:</span>
                        ${{ $car->price }}
                    </div>
                </div>
                <a href="/checkout/{{ $car->id }}">
                    <button class="buy-button">Buy Now</button>
                </a>
                <button class="wishlist-button">❣️WishList</button>
            </div>
        </div>
    </div>
</section>
