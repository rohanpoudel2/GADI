@php
    $isLogin = Request::is('login');
    $isRegister = Request::is('register');
    $isForgot = Request::is('forgot-password');
@endphp
<nav id="navbar">
    <div class="nav-items">
        <div class="left">
            <div class="logo"><a href="/">GADI</a></div>
        </div>
        <div class="cross" id='cross'>
            <i class="fa-solid fa-xmark"></i>
        </div>
        @if ($isLogin || $isRegister || $isForgot)
            <div class="nav-item" style="display: flex; justify-content:flex-end;">
            @else
                <div class="nav-item">
        @endif
        @if (!($isLogin || $isRegister || $isForgot))
            <div class="middle">
                <div class="nav-links">
                    <span class="nav-link"><a href="/">Home</a></span>
                    <span class="nav-link"><a href="/shop">Shop</a></span>
                    <span class="nav-link"><a href="/wishlist">WishList</a></span>
                </div>
            </div>
        @endif
        <div class="right">
            @if ($isLogin || $isRegister || $isForgot)
                <div class="login-links">
                    <div class="login-link"
                        @if ($isLogin) style="background-color: var(--primary-color); padding: 5px; border-radius:10px" @endif>
                        <a href="/login">Login</a>
                    </div>
                    <div class="login-links"
                        @if ($isRegister) style="background-color: var(--primary-color); padding: 5px; border-radius:10px" @endif>
                        <a href="/register">Sign Up</a>
                    </div>
                </div>
            @else
                <div class="nav-button">
                    @if (Auth::user() && Auth::user()->isAdmin())
                        <a href="/dashboard">
                            <button class="ride-button" id="dashboard-button">Dashboard</button>
                        </a>
                    @else
                        <button class="ride-button" id="ride-button">Book Test Ride</button>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="hamburger" id='ham'>
        <i class="fa-solid fa-bars"></i>
    </div>
    </div>
</nav>


@php
    $options = '';
    if (isset($cars)) {
        foreach ($cars as $car) {
            $options .= '<option value="' . $car->id . '">' . $car->brand->name . ' ' . $car->model . '</option>';
        }
    } else {
        $options .= '<option value="">NO CARS AVAILABLE</option>';
    }
    if (Auth::user()) {
        $formFields = [
            '
        <div class="form-item">
            <input type="text" name="user_id" id="user_id" value=' .
            Auth::user()->id .
            ' required hidden/>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value=' .
            Auth::user()->name .
            ' required>
        </div>
        ',
    
            '
        <div class="form-item">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value=' .
            Auth::user()->email .
            ' required>
        </div>
        ',
            '
        <div class="form-item">
            <label for="message">Select the car you want to test ride:</label>
            
            <select name="car_id" id="car_id" required>
                ' .
            $options .
            '
            </select>
        </div>
        ',
        ];
    }
    
@endphp

<div class="test-ride-form" id="test-ride-form" style="display: none">
    <button class="quit-form" id="quit-form">
        <i class="fa-solid fa-xmark"></i>
    </button>
    @if (Auth::user())
        @component('components.form', ['formFields' => $formFields])
            @slot('action')
                /addTestRide
            @endslot
            @slot('method')
                POST
            @endslot
            @slot('submitText')
                Book Test Ride
            @endslot
        @endcomponent
    @else
        <span>Please Login or Create an account to book a test ride.</span>
    @endif

</div>
