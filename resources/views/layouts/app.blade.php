<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Administrator') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- selec2 cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    @include('sweetalert::alert')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen  relative" x-data="{ open: false }" x-init="if (window.innerWidth >= 768) open = true"> {{-- <- x-init for sidebar --}}
        @include('layouts.navigation')
        {{-- resources/views/app.blade.php --}}

        {{-- {{ Breadcrumbs::render('dashboard') }} --}}

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


    @livewire('wire-elements-modal')
    @livewireScripts
    <script src="{{ url('Game/src/assets/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/js/all.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ url('resources/js/image.js') }}"></script>
    {{-- <script src="{{ url('select2/dist/js/select2.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                multiple: true,
                tags: true,
                allowClear: true
            });

        });
    </script>

    @stack('addon-script')
</body>
</html>
