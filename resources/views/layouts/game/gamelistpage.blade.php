<!DOCTYPE html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('includes.style')
</head>

<body class="bg-white dark:bg-slate-800">
    @include('includes.navbar')

    <!-- Start Main -->
    @yield('content')
    {{-- End Main --}}

    @include('includes.footer')

    @include('includes.script')

</body>

</html>
