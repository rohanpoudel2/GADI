@php
    $isShowCars = Request::is('addCar');
    $isShowBrands = Request::is('addBrand');
    $isShowUsers = Request::is('addUser');
    $isEditBrand = Request::is('editBrand');
    $isEditCar = Request::is('editCar');
@endphp

@if ($isShowCars)
    @php
        $options = '';
        foreach ($brands as $brand) {
            $options .= '<option value="' . $brand->id . '">' . $brand->name . '</option>';
        }
        $formFields = [
            '
            <div class="form-item">
            <img id="preview-selected-image" />
            <label for="image">Car Image: <i class="fa-solid fa-upload"></i></label>
            <input type="file" name="image" id="image" required onchange="previewImage(event);" hidden/>
            </div>
            ',
            '
        <div class="form-item">
            <label for="brand">Brand:</label>
            <select name="brand" id="brand" required>' .
            $options .
            '</select>
        </div>
        ',
            '
            <div class="form-item">
            <label for="type">Type:</label>
            <select name="type" id="type" required>
                <option value="suv">SUV</option>
                <option value="pickup">PICKUP</option>
                <option value="sedan">SEDAN</option>
                <option value="sport">SPORT</option>
            </select>
            </div>
            ',
            '
            <div class="form-item">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" required/>
            </div>
            ',
            '
            <div class="form-item">
            <label for="year">Year:</label>
            <input type="number" name="year" id="year" required/>
            </div>
            ',
            '
            <div class="form-item">
            <label for="engine">Engine:</label>
            <input type="text" name="engine" id="engine" required/>
            </div>
            ',
            '
            <div class="form-item">
                <label for="power">Power:</label>
                <input type="number" name="power" id="power" required/>
            </div>
            ',
            '
            <div class="form-item">
            <label for="topspeed">TopSpeed:</label>
            <input type="number" name="topspeed" id="topspeed" required/>
            </div>
            ',
            '
            <div class="form-item">
            <label for="interior">Interior:</label>
            <input type="text" name="interior" id="interior" required/>
            </div>
            ',
            '
            <div class="form-item">
            <label for="transmission">Transmission:</label>
            <input type="text" name="transmission" id="transmission" required/>
            </div>
            ',
            '
            <div class="form-item">
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" cols="20" required>
            </textarea>
            </div>
            ',
            '
            <div class="form-item">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required/>
            </div> 
            ',
        ];
    @endphp
@elseif ($isShowBrands)
    @php
        $formFields = [
            '
            <div class="form-item">
            <img id="preview-selected-image" />
            <label for="image">Brand Logo: <i class="fa-solid fa-upload"></i></label>
            <input type="file" name="image" id="image" required onchange="previewImage(event);" hidden />
            </div>
            ',
            '
            <div class="form-item">
            <label for="name">Brand Name:</label>
            <input type="text" name="name" id="name" required />
            </div>
            ',
        ];
    @endphp
@elseif ($isShowUsers)
    @php
        $formFields = [
            '
    <div class="form-item">
        <label for="name">User Name:</label>
        <input type="text" name="name" id="name" required />
    </div>
    ',
            '
    <div class="form-item">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required />
    </div>
    ',
            '
    <div class="form-item">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required />
    </div>
    ',
        ];
    @endphp
@elseif ($isEditBrand)
    @php
        $image = Storage::url($brand->image);
        $formFields = [
            "
            <div class=\"form-item\">
            <input type=\"text\" name=\"id\" id=\"id\" value=\"$brand->id\" hidden />
            <img id=\"preview-selected-image\" src=\"$image\" />
            <label for=\"image\">Brand Logo: <i class=\"fa-solid fa-upload\"></i></label>
            <input type=\"file\" name=\"image\" id=\"image\" onchange=\"previewImage(event);\" hidden />
            </div>
            ",
            "
            <div class=\"form-item\">
            <label for=\"name\">Brand Name:</label>
            <input type=\"text\" name=\"name\" id=\"name\" value=\"$brand->name\" required />
            </div>
            ",
        ];
    @endphp
@elseif($isEditCar)
    @php
        $image = Storage::url($car->image);
        $options = '';
        foreach ($brands as $brand) {
            if ($car->brand_id == $brand->id) {
                $options .= '<option value="' . $brand->id . '"selected>' . $brand->name . '</option>';
            } else {
                $options .= '<option value="' . $brand->id . '">' . $brand->name . '</option>';
            }
        }
        $types = ['suv', 'pickup', 'sedan', 'sport'];
        $typeOptions = '';
        $model = $car->model;
        $year = $car->year;
        $engine = $car->engine;
        $power = $car->power;
        $topspeed = $car->topspeed;
        $interior = $car->interior;
        $transmission = $car->transmission;
        $description = $car->description;
        $price = $car->price;
        foreach ($types as $type) {
            if ($car->type == $type) {
                $typeOptions .= '<option value="' . $car->type . '"selected>' . $car->type . '</option>';
            } else {
                $typeOptions .= '<option value="' . $type . '">' . $type . '</option>';
            }
        }
        $formFields = [
            "
    <div class=\"form-item\">
        <input type=\"text\" name=\"id\" id=\"id\" value=\"$car->id\" hidden />
    <img id=\"preview-selected-image\" src=\"$image\" />
    <label for=\"image\">Car Image: <i class=\"fa-solid fa-upload\"></i></label>
    <input type=\"file\" name=\"image\" id=\"image\" onchange=\"previewImage(event);\" hidden/>
    </div>
    ",
            '
<div class="form-item">
    <label for="brand">Brand:</label>
    <select name="brand" id="brand" required>' .
            $options .
            '</select>
</div>
',
            '
    <div class="form-item">
    <label for="type">Type:</label>
    <select name="type" id="type" required>
        ' .
            $typeOptions .
            '
    </select>
    </div>
    ',
            '
    <div class="form-item">
    <label for="model">Model:</label>
    <input type="text" name="model" id="model" value=' .
            $model .
            ' required/>
    </div>
    ',
            '
    <div class="form-item">
    <label for="year">Year:</label>
    <input type="number" name="year" id="year" value=' .
            $year .
            ' required/>
    </div>
    ',
            '
    <div class="form-item">
    <label for="engine">Engine:</label>
    <input type="text" name="engine" id="engine" value=' .
            $engine .
            ' required/>
    </div>
    ',
            '
    <div class="form-item">
        <label for="power">Power:</label>
        <input type="number" name="power" id="power" value=' .
            $power .
            ' required/>
    </div>
    ',
            '
    <div class="form-item">
    <label for="topspeed">TopSpeed:</label>
    <input type="number" name="topspeed" id="topspeed" value=' .
            $topspeed .
            ' required/>
    </div>
    ',
            '
    <div class="form-item">
    <label for="interior">Interior:</label>
    <input type="text" name="interior" id="interior" value=' .
            $interior .
            ' required/>
    </div>
    ',
            '
    <div class="form-item">
    <label for="transmission">Transmission:</label>
    <input type="text" name="transmission" id="transmission" value=' .
            $transmission .
            ' required/>
    </div>
    ',
            '
    <div class="form-item">
    <label for="description">Description:</label>
    <textarea name="description" id="description" rows="4" cols="20" required>' .
            $description .
            '</textarea>
    </div>
    ',
            '
    <div class="form-item">
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value=' .
            $price .
            ' required/>
    </div> 
    ',
        ];
    @endphp
@endif

<x-app-layout>
    <div class="dashboard-addNew">
        <div class="topbar">
            <h1 class="title">
                @if ($isShowCars)
                    Add New Car
                @elseif($isShowBrands)
                    Add New Brand
                @elseif($isShowUsers)
                    Add New User
                @elseif($isEditBrand)
                    Edit Brand
                @elseif ($isEditCar)
                    Edit Car
                @endif
            </h1>
        </div>
        <div class="form-section">
            @component('components.form', ['formFields' => $formFields])
                @slot('action')
                    @if ($isShowCars)
                        /addCar
                    @elseif($isShowBrands)
                        /addBrand
                    @elseif($isShowUsers)
                        /register
                    @elseif($isEditBrand)
                        /editBrand
                    @elseif($isEditCar)
                        /editCar
                    @endif
                @endslot
                @slot('method')
                    POST
                @endslot
                @if ($isEditBrand || $isEditCar)
                    @slot('changeMethod')
                        patch
                    @endslot
                @endif
                @slot('submitText')
                    @if ($isShowCars)
                        Add Car
                    @elseif($isShowBrands)
                        Add Brand
                    @elseif($isShowUsers)
                        Add User
                    @elseif($isEditBrand)
                        Edit brand
                    @elseif($isEditCar)
                        Edit Car
                    @endif
                @endslot
            @endcomponent
        </div>
    </div>
</x-app-layout>
