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
                    Add New Car
                @else
                    Add New Brand
                @endif
            </button>
        </div>
        @include('dashboard.dataTable')
</x-app-layout>
