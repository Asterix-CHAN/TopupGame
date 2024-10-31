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

    
    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased mx-2 ">
    <div class=" container min-h-screen min-w-full flex flex-col justify-center items-center  pt-6 sm:pt-0 bg-gray-100">
        {{ $header }}
        <div
            class="w-full  md:w-1/2 sm:max-w-md mt-6 px-6 py-4 bg-transparent shadow-md overflow-hidden sm:rounded-lg ">
            {{ $slot }}
        </div>
    </div>
   

</body>

</html>
