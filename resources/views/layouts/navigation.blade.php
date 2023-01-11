<nav class="dashboard-nav">
    <div class="dashboard-logo">
        <a href="/">
            <h1 class="logo">GADI</h1>
        </a>
    </div>
    <div class="dashboard-nav-profile">
        <img src="https://avatars.githubusercontent.com/u/66029221?v=4" alt="userImage">
        <h3 class="user-name">{{ Auth::user()->name }}</h3>
    </div>
    <div class="dashboard-nav-items">
        <div class="dashboard-nav-item">
            <a href="{{ route('dashboard') }}">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>
        </div>
        <div class="dashboard-nav-item">
            <a href="{{ route('profile.edit') }}">
                <i class="fa-solid fa-user"></i>
                Profile
            </a>
        </div>
        <div class="dashboard-nav-item">
            <a href="{{ route('profile.edit') }}">
                <i class="fa-solid fa-car"></i>
                Cars
            </a>
        </div>
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
