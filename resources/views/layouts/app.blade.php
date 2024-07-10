<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <div class="min-w-screen flex md:gap-4 mx-auto relative justify-center">
            <!-- Page sidebar -->

            <div class="w-1/6 inset-0 z-50 md:z-30 md:w-1/5  ">
                {{ $sidebar }}
            </div>

            <!-- Page Content -->
            <main class="h-auto w-4/5 z-30 md:w-5/6 md:mr-3 items-center">
                {{ $main }}
            </main>
        </div>
    </div>
</body>

</html>
