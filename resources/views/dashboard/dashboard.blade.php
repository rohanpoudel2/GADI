<x-app-layout>
    <div class="dashboard">
        @if (isset($error))
            {{ $error }}
        @endif
        <div class="dashboard-cards">
            @if (isset($featuredProduct))
                @component('dashboard.dashboardCards', ['cars' => $cars, 'featuredProduct' => $featuredProduct])
                @else
                    @component('dashboard.dashboardCards', ['cars' => $cars])
                    @endif
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
        </div>
    </x-app-layout>
