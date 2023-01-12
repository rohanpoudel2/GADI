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
                    <th>Type</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Engine</th>
                    <th>Power</th>
                    <th>TopSpeed</th>
                    <th>Interior</th>
                    <th>Transmission</th>
                    <th>Description</th>
                    <th>Colors</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        <img src="{{ asset('images/product/01.webp') }}" alt="product" class="product-image">
                    </td>
                    <td>BMW</td>
                    <td>Coupe</td>
                    <td>M4 CSL</td>
                    <td>2022</td>
                    <td>V8</td>
                    <td>435</td>
                    <td>240</td>
                    <td>Leather</td>
                    <td>Automatic</td>
                    <td
                        style="overflow: scroll;
              display: -webkit-box;
              -webkit-line-clamp: 3;
              -webkit-box-orient: vertical;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto id aliquid atque accusamus,
                        voluptas quae minus quidem nihil consequuntur, velit ea officiis ducimus et exercitationem
                        corrupti deserunt, dolores animi fugit!</td>
                    <td>[red,green,yellow]</td>
                    <td>$320,800</td>
                    <td>
                        <div class="actions">
                            <div class="delete">
                                <i class="fa-solid fa-trash"></i>
                            </div>
                            <div class="edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                        </div>
                    </td>
                </tr>
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
                                    <i class="fa-solid fa-trash"></i>
                                </div>
                                <div class="edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</div>
