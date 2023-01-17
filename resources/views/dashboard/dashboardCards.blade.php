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
                <span>Added:</span>
                @if ((string) $recentylAddedCar->isEmpty())
                    0
                @else
                    + {{ $recentylAddedCar }}
                @endif
            </div>
            <div class="right">
                <span>Deleted:</span>
                @if ((string) $recentlyDeletedCar->isEmpty())
                    0
                @else
                    {{ $recentlyDeletedCar }}
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
                <span>Added:</span>
                @if ((string) $recentylAddedBrand->isEmpty())
                    0
                @else
                    + {{ $recentylAddedBrand }}
                @endif
            </div>
            <div class="right">
                <span>Deleted:</span>
                @if ((string) $recentlyDeletedBrand->isEmpty())
                    0
                @else
                    {{ $recentlyDeletedBrand }}
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
