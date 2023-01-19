<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>@yield('page-title')🚗</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/744/744465.png">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @php
        $isLogin = Request::is('login');
        $isRegister = Request::is('register');
    @endphp
    @component('components.navbar')
    @endcomponent
    <div class="guest-login-body">
        <div class="left">
            <img src="{{ asset('images/loginpage.jpg') }}" alt="loginImage">
        </div>
        <div class="right">
            <div class="login-body">
                <h1>
                    @if ($isLogin)
                        Welcome Back
                    @elseif($isRegister)
                        Hi There
                    @endif
                </h1>
                <h3>
                    @if ($isLogin)
                        Please Login to your account
                    @elseif($isRegister)
                        Enter your details to create an account
                    @endif
                </h3>
                <div class="login-form">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>
</body>

</html>
