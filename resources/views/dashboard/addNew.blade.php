@php
    $isShowCars = Request::is('addCar');
    $isShowBrands = Request::is('addBrand');
    
    if ($isShowCars) {
        $formFields = [
            '
        <div class="form-item">
            <label for="image">Car Image: <i class="fa-solid fa-upload"></i></label>
            <input type="file" name="image" id="image" hidden/>
        </div>
        ',
            '
        <div class="form-item">
            <label for="brand">Brand:</label>
            <select name="brand" id="brand" required>
                <option value="BMW">BMW</option>
                <option value="BMW">BMW</option>
                <option value="BMW">BMW</option>
            </select>
        </div>
        ',
            '
        <div class="form-item">
            <label for="type">Type:</label>
            <select name="type" id="type" required>
                <option value="SUV">SUV</option>
                <option value="COUPE">COUPE</option>
                <option value="SEDAN">SEDAN</option>
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
        <div class="form-item colors">
          <div class="color">
            <label for="yellow">Yellow:</label>
            <input type="radio" id="yellow" name="color" value="yellow"/>
          </div>
          <div class="color">
            <label for="green">Green:</label>
            <input type="radio" id="green" name="color" value="green"/>
          </div>
          <div class="color">
            <label for="blue">Blue:</label>
            <input type="radio" id="blue" name="color" value="blue"/>
          </div>
        </div>
        ',
            '
        <div class="form-item">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required/>
        </div> 
        ',
        ];
    } else {
        $formFields = [
            '
        <div class="form-item">
            <label for="image">Brand Logo: <i class="fa-solid fa-upload"></i></label>
            <input type="file" name="image" id="image" required hidden/>
        </div>
        ',
            '
        <div class="form-item">
            <label for="name">Brand Name:</label>
            <input type="text" name="name" id="name" required/>
        </div>
        ',
        ];
    }
    
@endphp

<x-app-layout>
    <div class="dashboard-addNew">
        <div class="topbar">
            <h1 class="title">
                @if ($isShowCars)
                    Add New Car
                @else
                    Add New Brand
                @endif
            </h1>
        </div>
        <div class="form-section">
            @component('components.form', ['formFields' => $formFields])
                @slot('action')
                    @if ($isShowCars)
                        /addCar
                    @else
                        /addBrand
                    @endif
                @endslot
                @slot('method')
                    POST
                @endslot
                @slot('submitText')
                    @if ($isShowCars)
                        Add Car
                    @else
                        Add Brand
                    @endif
                @endslot
            @endcomponent
        </div>
    </div>
</x-app-layout>