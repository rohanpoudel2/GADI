<div class="dashboard-card">
    <div class="title">
        <h1>Total Cars</h1>
    </div>
    <div class="data">
        <h1>
            {{ $carCount }}
        </h1>
        <div class="recentActivity">
            <div class="left">
                @if ((string) $recentylAddedCar->isEmpty())
                    + 0
                @else
                    + {{ $recentylAddedCar }}
                @endif
            </div>
        </div>
    </div>
</div>

<div class="dashboard-card">
    <div class="title">
        <h1>Total Brands</h1>
    </div>
    <div class="data">
        <h1>
            {{ $brandCount }}
        </h1>
        <div class="recentActivity">
            <div class="left">
                @if ((string) $recentylAddedBrand->isEmpty())
                    + 0
                @else
                    + {{ $recentylAddedBrand }}
                @endif
            </div>
        </div>
    </div>
</div>

<div class="dashboard-card">
    <div class="title">
        <h1>Total Users</h1>
    </div>
    <div class="data">
        <h1>
            {{ $normalUserCount }}
        </h1>
    </div>
</div>

<div class="dashboard-card">
    <div class="data-featured">
        @if (isset($featuredProduct))
            <div class="topbar">
                <div class="no-featured-product">
                    <h3>Featured Product</h3>
                </div>
                @foreach ($featuredProduct as $featured)
                    <form id="deleteFeatured" action="{{ route('dashboard.deleteFeatured') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="text" name="id" value="{{ $featured->id }}" hidden required>
                        <button type="submit">Delete Featured</button>
                    </form>
                @endforeach
            </div>
            @foreach ($featuredProduct as $featured)
                @php
                    $image = Storage::url($featured->car->image);
                @endphp
                <div class="featured-product-dashboard">
                    <div class="featured-product-image">
                        <img src="{{ $image }}" alt="featuredCar">
                    </div>
                    <div class="featured-product-details">
                        <div class="car-name">
                            {{ $featured->car->brand->name }}
                            {{ $featured->car->model }}
                        </div>
                        <div class="tag-line">
                            {{ $featured->tagline }}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="topbar">
                <div class="no-featured-product">
                    <h3>No Featured Product Added</h3>
                </div>
            </div>
            <form id="addFeatured" method="POST" action="/dashboard">
                @csrf
                <h3>Select a Car to be Featured</h3>
                <input type="text" id="tagline" name="tagline" class="tagline" placeholder="Write a TagLine"
                    required style="color:black" />
                <select name="featured" id="featured" name="featured" required style="color:black">
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand->name . ' ' . $car->model }}</option>
                    @endforeach
                </select>
                <button type="submit">Add Featured</button>
            </form>
        @endif
    </div>
</div>
