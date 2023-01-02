<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/js/app.js')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>GADI 🚗</title>
</head>

<body>
    <div class="container">
        @component('components.navbar')
        @endcomponent
    </div>
    {{ $slot }}
    @component('components.newsletter')
    @endcomponent
    @component('components.footer')
    @endcomponent
</body>

</html>
