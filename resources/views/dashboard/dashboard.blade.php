<x-app-layout>
    <div class="dashboard">
        @if (isset($error))
            {{ $error }}
        @endif
        <div class="dashboard-cards">
            @component('dashboard.dashboardCards', ['cars' => $cars])
                @slot('carCount')
                    {{ $carCount }}
                @endslot
                @slot('recentylAddedCar')
                    {{ $recentlyAddedCar }}
                @endslot
                @slot('brandCount')
                    {{ $brandCount }}
                @endslot
                @slot('recentylAddedBrand')
                    {{ $recentlyAddedBrand }}
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
        @elseif(session()->has('error'))
            <div class="alert alert-error">
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>
</x-app-layout>
