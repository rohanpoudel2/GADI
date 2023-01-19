<div class="wishlist-card">
    <div class="car-image">
        <img src="{{ Storage::url($wishlist->car->image) }}" alt="car-image">
    </div>
    <div class="car-details">
        <div class="car-name">{{ $wishlist->car->brand->name . ' ' . $wishlist->car->model }}</div>
        <div class="car-price"><strong>Price:</strong> ${{ number_format($wishlist->car->price, 2) }}</div>
    </div>
    <div class="buttons">
        <a href="/checkout/{{ $wishlist->car->id }}">
            <div class="buy-button">Buy Car</div>
        </a>
        <form action="{{ route('wishlist.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="text" name="id" id="id" value="{{ $wishlist->id }}" hidden required>
            <button type="submit" class="delete-button">Remove From WishList</button>
        </form>
    </div>
</div>
