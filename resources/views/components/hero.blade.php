<div class="hero">
    <div class="hero-image">
        <img src="{{ $image }}" alt="hero-image">
    </div>
    <div class="container">
        <div class="hero-title">
            <span>Buy a car now and get 10% off</span>
            {{ $title }}
        </div>
        <div class="hero-desc">
            @if (isset($desc))
                <div class="left">
                    {{ $desc }}
                </div>
                <div class="right">
                    <button class="book-button">Book Now</button>
                </div>
            @endif
        </div>
    </div>
</div>
