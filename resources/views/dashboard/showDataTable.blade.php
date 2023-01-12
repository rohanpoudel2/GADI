<x-app-layout>
    @php
        $isShowCars = Request::is('cars');
        $isShowBrands = Request::is('brands');
    @endphp

    <div class="dashboard-showCars">
        <div class="topbar">
            <h1 class="title">
                @if ($isShowCars)
                    Cars
                @else
                    Brands
                @endif
            </h1>
            <button class="add-new-car">
                @if ($isShowCars)
                    <a href="{{ Route('dashboard.addCar') }}">
                        Add New Car
                    </a>
                @else
                    <a href="{{ Route('dashboard.addBrand') }}">
                        Add New Brand
                    </a>
                @endif
            </button>
        </div>
        @include('dashboard.dataTable')
</x-app-layout>
