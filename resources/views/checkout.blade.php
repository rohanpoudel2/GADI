<x-layout>
    <div class="container">
        <section class="checkout-section">
            <div class="title">Checkout Page</div>
            <div class="checkout-product">
                <div class="product">
                    <img src="{{ Storage::url($car->image) }}" alt="carImage">
                    <div class="car-name">
                        {{ $car->brand->name . ' ' . $car->model }}
                    </div>
                </div>
                <div class="checkout-form">
                    <form action="/checkout/{{ $car->id }}" method="POST">
                        @csrf
                        @auth
                            <button type="submit">Checkout</button>
                        @else
                            <span>Login or Create an Account to buy this product</span>
                        @endauth
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-layout>
