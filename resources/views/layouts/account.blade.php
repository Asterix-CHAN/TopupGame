<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Administrator') }}</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;800&display=swap');
    </style>
    {{--    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  --}}
    {{-- selec2 cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @include('includes.style')
   

    @include('sweetalert::alert')
</head>

<body class="bg-gray-300">
    @include('includes.navbar')
    <div class="w-full mx-3 md:container relative md:mx-auto "> 
        {{-- {{ Breadcrumbs::render('dashboard') }} --}}
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
        {{-- Content --}}
        @yield('content')

    </div>

    {{-- footer --}}
    @include('includes.footer')

    
    @include('includes.script')
    <script src="{{ url('Game/src/assets/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/js/all.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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
