<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/744/744465.png">
    <title>@yield('page-title')🚗</title>
</head>

<body>
    <div>
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                scrollX: true,
            });
        });
    </script>
    <script>
        const previewImage = (event) => {
            const imageFiles = event.target.files;

            const imageFilesLength = imageFiles.length;

            if (imageFilesLength > 0) {

                const imageSrc = URL.createObjectURL(imageFiles[0]);

                const imagePreviewElement = document.querySelector("#preview-selected-image");

                imagePreviewElement.src = imageSrc;

                imagePreviewElement.style.display = "block";
            }
        };

        const menu = document.getElementById('menu');
        const close = document.getElementById('close');

        menu.addEventListener('click', () => {
            var element = document.getElementById('humm');
            element.classList.add('open');
        })

        close.addEventListener('click', () => {
            var element = document.getElementById('humm');
            element.classList.remove('open');
        })
    </script>
</body>

</html>
