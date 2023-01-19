<x-app-layout>
    @php
        $isShowCars = Request::is('cars');
        $isShowBrands = Request::is('brands');
        $isShowUsers = Request::is('users');
    @endphp

    <div class="dashboard-showCars">
        <div class="topbar">
            <h1 class="title">
                @if ($isShowCars)
                    Cars
                @elseif($isShowBrands)
                    Brands
                @else
                    Users
                @endif
            </h1>
            <button class="add-new-car">
                @if ($isShowCars)
                    <a href="{{ Route('dashboard.addCarForm') }}">
                        Add New Car
                    </a>
                @elseif($isShowBrands)
                    <a href="{{ Route('dashboard.addBrandForm') }}">
                        Add New Brand
                    </a>
                @else
                @endif
            </button>
        </div>
        @include('dashboard.dataTable')
</x-app-layout>
