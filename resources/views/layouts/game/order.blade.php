<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('includes.style')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{ url('frontend/libraries/jquery/jquery-3.7.1.js') }}"></script>


</head>

<body>
    @include('includes.navbar')

    @yield('jumbotron')

    <!-- Start Main -->
    @yield('content')
    {{-- End Main --}}

    @include('includes.footer')
    

    @stack('top-addon-script')
    @include('includes.script')
    @stack('bottom-addon-script')
   
</body>

</html>
