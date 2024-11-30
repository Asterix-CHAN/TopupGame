<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('includes.style')
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    <script src="{{ url('frontend/libraries/jquery/jquery-3.7.1.js') }}"></script>
    @livewireStyles

</head>

<body>
    @include('includes.navbar')
    @if (Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ Session::get('success') }}'
        });
    </script>
@endif

@if (Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            'text': '{{ Session::get('error') }}'
        });
    </script>
@endif


@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <div class="alert-title">
            <h4 class="text-lg font-semibold">Whoops!</h4>
        </div>
        <span class="block sm:inline">There are some problems with your input.</span>
        <ul class="mt-2 list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @yield('jumbotron')

    <!-- Start Main -->
    @yield('content')
    {{-- End Main --}}

    @include('includes.footer')
    
    
    @stack('top-addon-script')
    @include('includes.script')
    @stack('bottom-addon-script')
    @livewire('wire-elements-modal')
    @livewireScripts
</body>

</html>
