<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('gallery.create') }}
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3 ml-4">
            {{ __('Tambah Image') }}
        </h2>
    </x-slot>


    <main>
        <div class="main-wrapper flex flex-col mb-5">
            <div class="main-content flex">
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
                    <form method="post" action="{{ route('product-packages.store') }}">
                        @csrf
                        <div class="card mt-5">
                        
                            <div class="card-body flex gap-2">
                                <div class="w-full">

                                    <div class="mb-4">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            name="topupgame_package_id" id="grid-state">
                                            <option>Pilih Produk</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('topupgame_package_id')
                                        <x-input-error :messages="$message"></x-input-error>
                                         @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="bg-white p-6 rounded-lg shadow-lg">
                                            <h1 class="text-2xl font-semibold mb-4">Upload an Image</h1>
                                            <div class="preview mt-4 mb-3" id="imagePreview">
                                                <p class="text-gray-500">No image selected</p>
                                            </div>
                                            <x-text-input type="number" name="price" 
                                                class="block" placeholder="Harga"></x-text-input>
                                                @error('price')
                                                <x-input-error :messages="$message"></x-input-error>
                                                 @enderror

                                                 <x-text-input type="number" name="diamond" 
                                                class="block" placeholder="diamond"></x-text-input>
                                                @error('diamond')
                                                <x-input-error :messages="$message"></x-input-error>
                                                 @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer flex justify-end">
                            <x-primary-button>Create</x-primary-button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </main>
    
   

</x-app-layout>
