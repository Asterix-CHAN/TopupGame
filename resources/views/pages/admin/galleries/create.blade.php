<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3 ml-4">
            {{ __('Tambah Game') }}
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
                    <form method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>New Product</h3>
                            </div>
                            <div class="card-body flex gap-2">
                                <div class="w-full">

                                    <div class="mb-4">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            name="topupgame_packages_id" id="grid-state">
                                            <option>Pilih Produk</option>
                                            @foreach ($topupgame_packages as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">

                                        <div class="flex items-center justify-start w-full">
                                            <label for="dropzone-file"
                                                class="flex flex-col items-center justify-center w-1/2 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 ">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                            class="font-semibold">Click to upload</span> or drag and
                                                        drop</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                                </div>
                                                <input id="dropzone-file" type="file" name="image" class="hidden" />
                                            </label>
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
                {{-- righ content --}}
                <div class="w-1/2 container">

                </div>
            </div>

        </div>
    </main>

</x-app-layout>
