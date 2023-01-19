<x-layout>
    @section('page-title')
        Wishlist
    @endsection
    <div class="container">
        <section class="wishlist">
            <div class="title">
                <h1>
                    <strong>
                        Wishlist
                    </strong>
                </h1>
            </div>
            <div class="wishlist-contents">
                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $list)
                        @include('components.wishListCard', ['wishlist' => $list])
                    @endforeach
                @else
                    <span class="no-wishlist">Add Products to the wishlist to see them here</span>
                @endif

            </div>
        </section>
        @if (session()->has('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-error">
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>
</x-layout>
