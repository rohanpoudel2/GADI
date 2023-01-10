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
                @if (Route::has('login'))
                    <div class="hidden">
                        @auth
                            <div class="social">
                                <a href="{{ url('/dashboard') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            </div>
                        @else
                            <div class="social">
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                    in</a>
                            </div>
                            @if (Route::has('register'))
                                <div class="social">
                                    <a href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
        <div class="middle">
            <h2>Menu</h2>
            <div class="footer-nav-links">
                <span class="nav-link">Home</span>
                <span class="nav-link">Shop</span>
                <span class="nav-link">About</span>
            </div>
        </div>
        <div class="right">
            <span>
                ©️ Rohan Poudel
            </span>
        </div>
    </div>
</footer>
