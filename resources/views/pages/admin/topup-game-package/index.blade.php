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

                                <div x-data="{ isOpen: false }" class="relative">
                                    <x-secondary-button @click="isOpen = !isOpen"><i
                                            class="fa-solid fa-folder-plus mr-1"></i>{{ __('Tambah Game') }}
                                    </x-secondary-button>

                                    <div x-show="isOpen"
                                        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                                        <div class="rounded-md bg-white shadow-xs">
                                            @include('pages.admin.topup-game-package.modal-create')
                                        </div>
                                    </div>
                                </div>
                                {{-- Livewire Button  --}}
                                {{-- <x-secondary-button onclick="Livewire.dispatch('openModal', { component: 'tambah-produk' })">Tambah Produk</x-secondary-button> --}}

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
                                                    {{-- <button x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-game-deletion')"
                                                        class="text-red-600 hover:text-red-400 "
                                                        data-confirm-delete="true"><i
                                                            class="fa fa-trash mx-1"></i>Delete</button>

                                                    <x-modal name="confirm-game-deletion" :show="$errors->gameDeletion->isNotEmpty()" focusable>
                                                        <form action="{{ route('game-packages.destroy', $item->id) }}"
                                                            method="POST" class="p-6">
                                                            @csrf
                                                            @method('DELETE')
                                                            <h2 class="text-lg font-medium text-gray-900">
                                                                {{ __('Are you sure you want to delete your game?') }}
                                                            </h2>

                                                            <p class="mt-1 text-sm text-gray-600">
                                                                {{ __('Once your game is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your game.') }}
                                                            </p>

                                                            <div class="mt-6">
                                                                <x-input-label for="password"
                                                                    value="{{ __('Password') }}" class="sr-only" />

                                                                <x-text-input id="password" name="password"
                                                                    type="password" class="mt-1 block w-3/4"
                                                                    placeholder="{{ __('Password') }}" />

                                                                <x-input-error :messages="$errors->gameDeletion->get('password')" class="mt-2" />
                                                                
                                                                <div class="mt-6 flex justify-end">
                                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                                        {{ __('Cancel') }}
                                                                    </x-secondary-button>

                                                                    <x-danger-button class="ms-3">
                                                                        {{ __('Delete Game') }}
                                                                    </x-danger-button>
                                                                </div>
                                                        </form>
                                                    </x-modal> --}}

                                                    <x-modal-destroy>
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
                                                    </x-modal-destroy>
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
