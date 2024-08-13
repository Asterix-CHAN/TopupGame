<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('gallery.edit', $galeri) }}
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3 ml-4">
            {{ __('Edit Image') }}
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
                    <form method="post" action="{{ route('gallery.update', $galeri->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card mt-5">
                            <div class="card-body flex gap-2">
                                <div class="w-full">
                                    <div class="mb-4">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            name="topupgame_packages_id" required id="grid-state">
                                            @forelse ($games as $game)
                                                <option value="{{ $game->id }}"
                                                    {{ $galeri->topupgame_packages_id === $game->id ? 'selected' : '' }}>
                                                    {{ $game->name }}</option>
                                            @empty
                                                <span>Data Kosong!</span>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="flex items-center justify-center w-full gap-4">
                                        <label for="dropzone-file"
                                            class="flex flex-col items-center justify-center w-1/2 h-40 aspect-video border-2 border-gray-300 border-dashed  cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600  object-cover object-center rounded-lg shadow-lg  border-collapse ">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                @if ($galeri->image)
                                                    <div>
                                                        <img src="{{ Storage::url($galeri->image) }}"
                                                            alt="Current Image"
                                                            class="w-36 h-40 object-cover object-center rounded-lg shadow-lg border border-collapse aspect-square">
                                                    </div>
                                                @endif
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                        class="font-semibold">Click to upload</span> or drag and drop
                                                </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG
                                                    (MAX. 800x400px)</p>
                                            </div>
                                            <input id="dropzone-file" type="file" name="image" class="hidden" />
                                        </label>
                                    </div>

                                    {{-- <div class="mb-4">
                                        <label for="formFile"
                                            class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                                        @if ($galeri->image)
                                            <div class="mt-2">
                                                <img src="{{ Storage::url($galeri->image) }}" alt="Current Image"
                                                    class="w-32 h-32 object-cover object-center rounded-lg shadow-lg border border-collapse aspect-square">
                                            </div>
                                        @endif
                                        <x-text-input type="file" name="image"></x-text-input>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer flex justify-end mt-2">
                                <x-primary-button>{{ __('Ubah') }}</x-primary-button>
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
