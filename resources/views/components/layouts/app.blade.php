<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @livewireStyles
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, #a8dadc 25%, #457b9d 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col justify-between">
    <div class="flex flex-col justify-center items-center flex-grow w-full mb-3 mt-3">
        {{ $slot }}
    </div>

    <footer class="bg-white shadow-md py-4 w-full">
        <div class="container mx-auto text-center">
            <p class="text-gray-600">&copy; {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved. {{ $settings->name }} [{{ $settings->support_email }}]</p>
            <div class="flex justify-center mt-2">
                <a href="tel:{{ $settings->support_phone }}" class="text-gray-600 hover:text-gray-800 mx-2">
                    <i class='bx bx-phone'></i>
                </a>
                <a href="{{ $settings->facebook }}" class="text-gray-600 hover:text-gray-800 mx-2" target="_blank">
                    <i class='bx bxl-facebook-circle'></i>
                </a>
                <a href="{{ $settings->twitter }}" class="text-gray-600 hover:text-gray-800 mx-2" target="_blank">
                    <i class='bx bxl-twitter'></i>
                </a>
                <a href="{{ $settings->instagram }}" class="text-gray-600 hover:text-gray-800 mx-2" target="_blank">
                    <i class='bx bxl-instagram-alt'></i>
                </a>
                <a href="{{ $settings->linkedin }}" class="text-gray-600 hover:text-gray-800 mx-2" target="_blank">
                    <i class='bx bxl-linkedin'></i>
                </a>
                <a href="{{ $settings->youtube }}" class="text-gray-600 hover:text-gray-800 mx-2" target="_blank">
                    <i class='bx bxl-youtube'></i>
                </a>
                <a href="{{ $settings->whatsapp }}" class="text-gray-600 hover:text-gray-800 mx-2" target="_blank">
                    <i class='bx bxl-whatsapp'></i>
                </a>
                <a href="{{ $settings->github }}" class="text-gray-600 hover:text-gray-800 mx-2" target="_blank">
                    <i class='bx bxl-github'></i>
                </a>
            </div>
        </div>
    </footer>

    @livewireScripts
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::flash />
</body>

</html>
