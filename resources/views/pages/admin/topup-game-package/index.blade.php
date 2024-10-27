<x-app-layout>


    <x-slot name="header">
        <div class="mx-2 md:container md:mx-auto sm:px-8 lg:px-10">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3 ">
                {{ __('Daftar Game') }}
            </h2>
        </div>
    </x-slot>

    <main>
        <!-- Begin Page Content -->
        <div class="container-fluid px-2 md:px-0 pt-10">
            <!-- Page Heading -->
            <div class="md:container mx-auto ">
                <div class="flex flex-col">
                    {{-- sm:-mx-6 lg:-mx-8 --}}
                    <div class="overflow-x-auto">
                        <div class="py-2 inline-block w-full sm:px-6 lg:px-8">

                            <div class="col-lg-12 mb-4 flex justify-end">

                                <x-secondary-button x-data=""  x-on:click.prevent="$dispatch('open-modal', 'modal-create-game')" name="">
                                    <i class="fa-solid fa-folder-plus mr-1"></i>{{ __('Tambah Game') }}
                                </x-secondary-button>

                                <x-modal name="modal-create-game" focusable >
                                    <div class=" w-full inset-0 items-center  bg-white shadow-xl rounded-lg pb-2 scroll-m-0">
                                        {{--  --}}
                                        <form method="post" action="{{ route('game-packages.store') }}" class="mx-5"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card mt-5">
                                                <div class="card-body flex gap-2">
                                                    <div class="w-full">
                                                        <div class="mb-4">
                                                            <label
                                                                class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                                            <x-text-input type="text" name="name"
                                                                value="{{ old('name') }}"
                                                                placeholder="Name"></x-text-input>
                                                            @error('name')
                                                                <x-input-error :messages="$message"></x-input-error>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-4">
                                                            <label
                                                                class="block text-gray-700 text-sm font-bold mb-2">Developer</label>
                                                            <x-text-input type="text" name="developer"
                                                                value="{{ old('developer') }}"
                                                                placeholder="Developer"></x-text-input>
                                                            @error('developer')
                                                                <x-input-error :messages="$message"></x-input-error>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-4">
                                                            <label
                                                                class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                                            <x-text-input type="text" name="description"
                                                                value="{{ old('description') }}"
                                                                placeholder="Description"></x-text-input>
                                                            @error('description')
                                                                <x-input-error :messages="$message"></x-input-error>
                                                            @enderror

                                                        </div>
                                                        <div class="mb-4">
                                                            <label
                                                                class="block text-gray-700 text-sm font-bold mb-2">About</label>
                                                            <textarea type="text" cols="50"
                                                                class="shadow appearance-none border rounded w-full px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                                name="about" placeholder="About">{{ old('about') }}</textarea>
                                                            @error('about')
                                                                <x-input-error :messages="$message"></x-input-error>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="category_id"
                                                                class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                                                            <select name="category_id[]" id="category_id"
                                                                class="select2-multiple" multiple>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id[]')
                                                                <x-input-error :messages="$message"></x-input-error>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-4">
                                                            <label for="platforms"
                                                                class="block text-gray-700 text-sm font-bold mb-2">Platform</label>
                                                            <select name="platform_id" class="w-full rounded-md">
                                                                <option>Pilih Platform!</option>
                                                                @foreach ($platforms as $platform)
                                                                    <option value="{{ $platform->id }}">
                                                                        {{ $platform->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('platform_id')
                                                                <x-input-error :messages="$message"></x-input-error>
                                                            @enderror
                                                        </div>


                                                        <div class="mb-4">
                                                            <label for="imageUpload"
                                                                class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                                                            <div class="preview mt-4 mb-3" id="imagePreview">
                                                                <p
                                                                    class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                                    No image
                                                                    selected</p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG,
                                                                    JPG, JPEG (MAX.
                                                                    2MB)</p>

                                                            </div>
                                                            <x-text-input type="text" type="file" name="image"
                                                                id="imageUpload"></x-text-input>
                                                            @error('image')
                                                                <x-input-error :messages="$message"></x-input-error>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Cancel') }}
                                                </x-secondary-button>

                                                <x-primary-button class="ms-3">
                                                    {{ __('Simpan') }}
                                                </x-primary-button>
                                            </div>
                                        </form>
                                    </div>   
                                </x-modal>

                                {{-- <div x-data="{ isOpen: false }" class="relative">
                                    <x-secondary-button @click="isOpen = !isOpen"><i
                                            class="fa-solid fa-folder-plus mr-1"></i>{{ __('Tambah Game') }}
                                    </x-secondary-button>

                                    <div x-show="isOpen"
                                        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                                        <div class="rounded-md bg-white shadow-xs">
                                            @include('pages.admin.topup-game-package.modal-create')
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 items-center">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Image</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Developer</th>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Category</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Platform</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 items-center">
                                        @forelse ($items as $index=>$item)
                                            <tr>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $index + 1 }}</td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $item->name }}</td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <img src="{{ Storage::url($item->image) }}" alt=""
                                                        class="object-cover w-16 aspect-square rounded-lg object-center">
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $item->developer }}</td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase ">
                                                    @forelse ($item->categories as $category)
                                                        {{ $category->name }}
                                                    @empty
                                                        <span>No category found.</span>
                                                    @endforelse
                                                </td>

                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $item->platform_name ? $item->platform_name->name : 'No platform available' }}
                                                </td>

                                                <td scope="col"
                                                    class="px-6 py-3 items-end  text-xs font-medium text-gray-500 tracking-wider gap-1 flex flex-col ">
                                                    {{-- Edit --}}
                                                    <a href="{{ route('game-packages.edit', $item->uuid) }}"
                                                        class="text-blue-600 hover:text-blue-400 flex flex-row"><i
                                                            class="fa-solid fa-pen-to-square mx-1"></i>Edit
                                                    </a>
                                                    
                                                    {{-- Product --}}
                                                    <a href="{{ route('game-packages.show', $item->slug) }}"
                                                        class="text-orange-500 hover:text-orange-400 flex flex-row">
                                                        <i class="fa-solid fa-warehouse mx-1"></i>Produk
                                                    </a>
                                                    
                                                    {{-- Delete --}}
                                                   <a href="{{ route('game-packages.destroy', $item->uuid) }}" class="text-red-600 hover:text-red-400 flex flex-row"
                                                    data-confirm-delete="true"><i
                                                        class="fa fa-trash mx-1"></i>Delete
                                                   </a>

                                                    {{-- <x-modal-destroy>
                                                        <x-slot name="trigger">
                                                            <button type="button"
                                                                class="text-red-600 hover:text-red-400 flex flex-row"
                                                                data-confirm-delete="true"><i
                                                                    class="fa fa-trash mx-1"></i>Delete</button>
                                                        </x-slot>
                                                        <x-slot name="title">
                                                            <h3>Delete Produk</h3>
                                                        </x-slot>
                                                        <x-slot name="content">
                                                            <p>Are you sure you want to delete this product?</p>
                                                        </x-slot>
                                                        <x-slot name="submit">
                                                            <form
                                                                action="{{ route('game-packages.destroy', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <x-primary-button
                                                                    class="text-white bg-red-500  hover:bg-red-700 focus:bg-red-700 flex flex-row"
                                                                    data-confirm-delete="true"><i
                                                                        class="fa fa-trash mx-1"></i>Delete</x-primary-button>
                                                            </form>
                                                        </x-slot>
                                                        <x-slot
                                                            name="cancel"><x-secondary-button>Cancel</x-secondary-button></x-slot>
                                                    </x-modal-destroy> --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">Data Kosong</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                {{ $items->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


</x-app-layout>
