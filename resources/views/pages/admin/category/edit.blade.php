<x-app-layout>
    <x-slot name="header">
        <div class="md:container mx-auto sm:px-6 lg:px-8">
            <div > 
                {{ Breadcrumbs::render('category.edit', $datas) }} 
            </div>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Edit Category') }}
            </h2>
        </div>
    </x-slot>


    <main>
        <div class="main-wrapper flex flex-col mb-5">
            <div class="main-content">
                <div class="container w-1/2">

                    @if (Session::has('success'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: '{{ Session::get('success') }}'
                                    });
                                </script>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
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
                    <form method="post" action="{{ route('category.update', $datas->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card mt-5">

                            <div class="card-body flex gap-2">
                                <div class="w-full">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>
                                        <x-text-input type="text" name="name"
                                            value="{{ $datas->name }}"></x-text-input>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer flex justify-end">
                                <x-primary-button type='submit'>{{ __('Ubah') }}</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- righ content --}}
                <div class="w-1/2">
                    @yield('content')
                </div>
            </div>

        </div>
    </main>

</x-app-layout>
