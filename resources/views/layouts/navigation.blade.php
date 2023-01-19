<nav class="dashboard-nav">
    <div class="dashboard-logo">
        <a href="/">
            <h1 class="logo">GADI</h1>
        </a>
    </div>
    <div class="dashboard-nav-profile">
        <img src="{{ asset('images/avatar.jpeg') }}" alt="userImage">
        <h3 class="user-name">{{ Auth::user()->name }}</h3>
    </div>
    <div class="dashboard-nav-items">
        @if (Auth::user()->is_admin)
            <div class="dashboard-nav-item">
                <a href="{{ route('dashboard') }}">
                    <div>
                        <i class="fa-solid fa-house"></i>
                        Dashboard
                    </div>
                </a>
            </div>
            <div class="dashboard-nav-item">
                <a href="{{ route('profile.edit') }}">
                    <div>
                        <i class="fa-solid fa-user"></i>
                        Profile
                    </div>
                </a>
            </div>
            <div class="dashboard-nav-item">
                <a href="{{ route('dashboard.showCars') }}">
                    <div>
                        <i class="fa-solid fa-car"></i>
                        Cars
                    </div>
                </a>
            </div>
            <div class="dashboard-nav-item">
                <a href="{{ route('dashboard.showBrands') }}">
                    <div>
                        <i class="fa-brands fa-bandcamp"></i>
                        Brands
                    </div>
                </a>
            </div>
            <div class="dashboard-nav-item">
                <a href="{{ route('dashboard.showUsers') }}">
                    <div>
                        <i class="fa-solid fa-users"></i>
                        Users
                    </div>
                </a>
            </div>
        @else
            <div class="dashboard-nav-item">
                <a href="{{ route('profile.edit') }}">
                    <div>
                        <i class="fa-solid fa-user"></i>
                        Profile
                    </div>
                </a>
            </div>
        @endif
        <div class="dashboard-nav-item">
            <form method="POST" action="{{ route('logout') }}"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
                @csrf
                <a href="{{ route('logout') }}">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>
            </form>
        </div>
    </div>
</nav>
