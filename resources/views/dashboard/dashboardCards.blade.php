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
        @else
            <div class="topbar">
                <div class="no-featured-product">
                    <h3>No Featured Product Added</h3>
                </div>
                <div class="add-product-button" onclick="showAddFeatured();">
                    <button>Add Featured Product</button>
                </div>
            </div>
        @endif
        <form id="addFeatured" method="POST" action="{{ route('dashboard.addFeatured') }}">
            @csrf
            <h3>Select a Car to be Featured</h3>
            <input type="text" id="tagline" name="tagline" class="tagline" placeholder="Write a TagLine" required
                style="color:black" />
            <select name="featured" id="featured" name="featured" required style="color:black">
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->brand->name . ' ' . $car->model }}</option>
                @endforeach
            </select>
            <button type="submit">Add Featured</button>
        </form>
    </div>
</div>
