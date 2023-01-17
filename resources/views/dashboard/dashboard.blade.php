<x-app-layout>
    <div class="dashboard">
        @if (isset($error))
            {{ $error }}
        @endif
        <div class="dashboard-cards">
            @component('dashboard.dashboardCards')
                @slot('carCount')
                    {{ $carCount }}
                @endslot
                @slot('recentylAddedCar')
                    {{ $recentlyAddedCar }}
                @endslot
                @slot('recentlyDeletedCar')
                    {{ $recentlyDeletedCar }}
                @endslot
                @slot('brandCount')
                    {{ $brandCount }}
                @endslot
                @slot('recentylAddedBrand')
                    {{ $recentlyAddedBrand }}
                @endslot
                @slot('recentlyDeletedBrand')
                    {{ $recentlyDeletedBrand }}
                @endslot
                @slot('normalUserCount')
                    {{ $normalUser }}
                @endslot
            @endcomponent
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </div>
</x-app-layout>
