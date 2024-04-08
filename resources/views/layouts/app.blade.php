<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Remix icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/remix-icons/remixicon.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Common JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- JQuery form validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <div class="bg-gray-500 py-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="flex items-center text-white mx-auto">
                <div class="px-2">
                    <a href="#">International</a>
                </div>
                <div class="px-2">
                    <a href="#">Privacy Policy</a>
                </div>
                <div class="px-2">
                    <a href="#">GDPR Policy</a>
                </div>
            </div>
            <div class="flex items-center text-white mx-auto">
                <div class="px-2"><i class="ri-smartphone-line mr-4px"></i>xxx xxx xxx</div>
                <div class="px-2"><i class="ri-mail-line mr-4px"></i>info@test.com</div>
            </div>
            <div class="flex items-center text-white mx-auto">
                &copy; 2024 All rights reserved
            </div>
        </div>
    </div>

    <div id="overlay" class="hidden fixed w-full h-full bg-black bg-opacity-50 z-10 top-0"></div>
</body>
</html>
