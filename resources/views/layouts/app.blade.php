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

<body class="bg-blue-500">
    <div class="min-h-screen bg-gray-100 relative" x-data="{ open: false }" x-init="if (window.innerWidth >= 768) open = true">
        @include('layouts.navigation')

        <div class="min-w-screen flex mx-auto justify-center ">
            <!-- Page sidebar -->

            <div class="w-1/2 h-screen md:block inset-0 md:w-1/5 md:top-24 z-30 md:z-0 fixed md:sticky transition-transform duration-300 ease-in-out"
                :class="{ 'block': open, 'hidden': !open }" @click.away="open = true">

                @include('includes.admin.sidebar')
            </div>


            <!-- Page Content -->
            <main class="h-auto w-full md:w-5/6 md:mr-3 items-center">

                {{ $header }}

                {{ $slot }}

            </main>
        </div>
    </div>
</body>


<script src="{{ url('Game/src/assets/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/js/all.js') }}"></script>

</html>
