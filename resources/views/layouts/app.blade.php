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
   
    @vite(['resources/css/app.css', 'resources/js/app.js',])
    @livewireStyles

    @include('sweetalert::alert')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen  relative" x-data="{ open: false }" x-init="if (window.innerWidth >= 768) open = true"> {{-- <- x-init for sidebar --}}
        @include('layouts.navigation')
        {{-- resources/views/app.blade.php --}}
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

    {{-- Data Tables --}}
    {{-- <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.1.2/b-html5-3.1.2/b-print-3.1.2/date-1.5.4/r-3.0.3/sc-2.4.3/sb-1.8.1/sp-2.3.3/datatables.min.css" rel="stylesheet">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.1.2/b-html5-3.1.2/b-print-3.1.2/date-1.5.4/r-3.0.3/sc-2.4.3/sb-1.8.1/sp-2.3.3/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.4/js/dataTables.dateTime.min.js"></script> --}}
{{-- Data Tables --}}
    
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
