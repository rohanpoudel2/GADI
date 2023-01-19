<x-app-layout>
    <div class="dashboard">
        @if (isset($error))
            {{ $error }}
        @endif
        @if (Auth::user()->is_admin)
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
                        @slot('recentlyAddedUsers')
                            {{ $recentlyAddedUsers }}
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
    @else
        <span>Nothing to see here!!</span>
        @endif

    </x-app-layout>
