@php
    $isShowCars = Request::is('cars');
    $isShowBrands = Request::is('brands');
@endphp

<div class="dataTable">
    @if ($isShowCars)
        <table id="dataTable" class="compact hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Year</th>
                    <th>Engine</th>
                    <th>Power</th>
                    <th>TopSpeed</th>
                    <th>Interior</th>
                    <th>Transmission</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>
                            {{ $car->id }}
                        </td>
                        <td>
                            <img src="{{ Storage::url($car->image) }}" alt="carimage" class="brand-logo">
                        </td>
                        <td>
                            {{ $car->brand->name }}
                        </td>
                        <td>
                            {{ $car->model }}
                        </td>
                        <td>
                            {{ $car->type }}
                        </td>
                        <td>
                            {{ $car->year }}
                        </td>
                        <td>
                            {{ $car->engine }}
                        </td>
                        <td>
                            {{ $car->power }}
                        </td>
                        <td>
                            {{ $car->topspeed }}
                        </td>
                        <td>
                            {{ $car->interior }}
                        </td>
                        <td>
                            {{ $car->transmission }}
                        </td>
                        <td
                            style="overflow: scroll;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;">
                            {{ $car->description }}
                        </td>
                        <td>
                            {{ $car->price }}
                        </td>
                        <td>
                            <div class="actions">
                                <div class="delete">
                                    <form method="post" action="/cars">
                                        @csrf
                                        @method('DELETE')
                                        <input type="text" name="id" id="id" value="{{ $car->id }}"
                                            hidden>
                                        <button type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="edit">
                                    <form method="GET" action="{{ Route('dashboard.editCarForm') }}">
                                        <input type="text" name="id" id="id" value="{{ $car->id }}"
                                            hidden>
                                        <button type="submit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <table id="dataTable" class="hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Brand</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>
                            {{ $brand->id }}
                        </td>
                        <td>
                            <img src="{{ Storage::url($brand->image) }}" alt="brandLogo" class="brand-logo">
                        </td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <div class="actions">
                                <div class="delete">
                                    <form method="post" action="/brands">
                                        @csrf
                                        @method('DELETE')
                                        <input type="text" name="id" id="id" value="{{ $brand->id }}"
                                            hidden>
                                        <button type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="edit">
                                    <form method="GET" action="/editBrand">
                                        <input type="text" name="id" id="id" value="{{ $brand->id }}"
                                            hidden>
                                        <button type="submit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-error">
            <p>{{ session()->get('error') }}</p>
        </div>
    @endif
</div>
