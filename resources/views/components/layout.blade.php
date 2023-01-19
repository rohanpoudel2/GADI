<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/js/app.js')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/744/744465.png">
    <title>@yield('page-title')🚗</title>
</head>

<body>
    <div class="container">
        @if (isset($cars))
            @include('components.navbar', ['cars' => $cars])
        @else
            @include('components.navbar')
        @endif
    </div>
    {{ $slot }}
    @if (!isset($dontshow))
        @include('components.newsletter')
    @endif
    @include('components.footer')
    <script>
        const ride_button = document.getElementById('ride-button');
        const testRideForm = document.getElementById('test-ride-form');
        const testRideFormCloseButton = document.getElementById('quit-form');

        ride_button.addEventListener('click', () => {
            if (testRideForm.style.display === "none") {
                testRideForm.style.display = "block";
            } else {
                testRideForm.style.display = "none";
            }
        })

        testRideFormCloseButton.addEventListener('click', () => {
            testRideForm.style.display = "none"
        })

        const cross = document.getElementById('cross');
        const ham = document.getElementById('ham');

        cross.addEventListener('click', () => {
            var element = document.getElementById('navbar');
            element.classList.remove('open');
        })

        ham.addEventListener('click', () => {
            var element = document.getElementById('navbar');
            element.classList.add('open');
        })
    </script>
</body>

</html>
