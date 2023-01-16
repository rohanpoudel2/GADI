<div class="card">
    <div class="top">
        <div class="left">
            <h1 class="title">{{ $name }}</h1>
        </div>
        <div class="right">
            <button class="buy-button">
                <a href="/shop/product/1">
                    Buy Now
                </a>
            </button>
        </div>
    </div>
    <div class="middle">
        @php
            $img = Storage::url($image);
        @endphp
        <img src="{{ $img }}" alt="car">
    </div>
    <div class="bottom">
        <div class="specs">
            <div class="spec">
                <span>Top Speed</span>
                <h4>{{ $topspeed }} KMPH</h4>
            </div>
            <div class="spec">
                <span>Power</span>
                <h4>{{ $power }} HP</h4>
            </div>
            <div class="spec">
                <span>Engine</span>
                <h4>{{ $engine }}</h4>
            </div>
        </div>
        <div class="price">
            <span>Price</span>
            <h4>${{ number_format((string) $price, 0) }}</h4>
        </div>
    </div>
</div>
