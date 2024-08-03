<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('includes.style')
    @livewireStyles
</head>

<body>
    @include('includes.navbar')

   

    <!-- Start Main -->
    @yield('content')
    {{-- End Main --}}

    @include('includes.footer')
    @livewireScripts
    @include('includes.script')

</body>

</html>
