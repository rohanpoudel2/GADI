<nav>
    <div class="nav-items">
        <div class="left">
            <div class="logo"><a href="/">GADI</a></div>
        </div>
        <div class="middle">
            <div class="nav-links">
                <span class="nav-link"><a href="/">Home</a></span>
                <span class="nav-link"><a href="/shop">Shop</a></span>
                <span class="nav-link"><a href="/contact">Contact</a></span>
            </div>
        </div>
        <div class="right">
            <div class="nav-button">
                <button class="ride-button" id="ride-button">Book Test Ride</button>
            </div>
        </div>
    </div>
</nav>


@php
    $formFields = [
        '
        <div class="form-item">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" >
        </div>
        ',
    
        '
        <div class="form-item">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" >
        </div>
        ',
    
        '
        <div class="form-item">
            <label for="message">Select the car you want to test ride:</label>
            
            <select name="selected-car" id="selected-car">
                <option value="BMW M4 CSL">BMW M3 CSL</option>
                <option value="BMW M4 CSL">BMW M4 CSL</option>
                <option value="BMW M4 CSL">BMW M8 CSL</option>
            </select>
        </div>
        ',
    ];
@endphp

<div class="test-ride-form" id="test-ride-form" style="display: none">
    <button class="quit-form" id="quit-form">
        <i class="fa-solid fa-xmark"></i>
    </button>
    @component('components.form', ['formFields' => $formFields])
        @slot('action')
            /test-form
        @endslot
        @slot('method')
            POST
        @endslot
        @slot('submitText')
            Book Test Ride
        @endslot
    @endcomponent
</div>
