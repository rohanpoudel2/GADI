<footer>
    <div class="container">
        <div class="left">
            <div class="footer-logo">
                <h1>GADI</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit cumque quos sit nam accusantium
                    velit,
                    optio, repellendus beatae dolore nostrum in facere praesentium. Architecto ea fugiat ratione vero
                    eveniet atque?
                </p>
            </div>
            <div class="socials">
                @auth
                    <div class="social">
                        <a href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                    </div>
                    <div class="social">
                        <form method="POST" action="{{ route('logout') }}"
                            onclick="event.preventDefault();
                this.closest('form').submit();">
                            @csrf
                            <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </a>
                        </form>
                    </div>
                @else
                    <div class="social">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                            in</a>
                    </div>
                    <div class="social">
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    </div>
                @endauth
            </div>
        </div>
        <div class="middle">
            <h2>Menu</h2>
            <div class="footer-nav-links">
                <span class="nav-link">
                    <a href="/">
                        Home
                    </a>
                </span>
                <span class="nav-link">
                    <a href="/shop">
                        Shop
                    </a>
                </span>
                <span class="nav-link">
                    <a href="/wishlist">
                        Wishlist
                    </a>
                </span>
            </div>
        </div>
        <div class="right">
            <span>
                ©️ Rohan Poudel
            </span>
        </div>
    </div>
</footer>
