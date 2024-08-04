<x-app-layout>
    <x-slot name="header">
        <div class="md:container mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Daftar Produk') }}
            </h2>
        </div>
    </x-slot>



    <main>
        <!-- Begin Page Content -->
        <div class="container-fluid pt-10">
            <!-- Page Heading -->
            <div class="md:container mx-auto">
                <div class="flex flex-col">
                    {{-- sm:-mx-6 lg:-mx-8 --}}
                    <div class="overflow-x-auto ">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">

                            <div class="col-lg-12 mb-4 flex justify-end gap-4">
                                {{-- <a href="{{ route('topup-package.create') }}"
                                    class="bg-blue-500 rounded-lg px-2 py-1 hover:bg-blue-700 focus:bg-blue-600 text-white text-lg font-sans">Tambah
                                    Game</a> --}}
                                <div x-data="{ isOpen: false }" class="relative ...">
                                    <x-secondary-button @click="isOpen = !isOpen">{{ __('Tambah Produk') }}
                                    </x-secondary-button>

                                    <div x-show="isOpen"
                                        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                                        <div class="rounded-md bg-white shadow-xs">
                                            @include('pages.admin.topup-game-package.modal-create')
                                        </div>
                                    </div>
                                </div>

                                {{-- <div x-data="{ isOpen: false }" class="relative ...">
                                    <button type="button" @click="isOpen = !isOpen" class=" bg-blue-500 hover:bg-blue-700 font-semibold text-white px-2 rounded-md">
                                        Tambah Kategori
                                    </button>

                                    <div x-show="isOpen" x-transition:enter="transition ease-in-out duration-300 "
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="ease-in duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                                        <div class="rounded-md bg-white shadow-xs">
                                            @include('pages.admin.category.modal-category')
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="overflow-hidden shadow-md sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 items-center">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID</th>
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
                                                Stock</th>

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
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $item->stock }}</td>

                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                    @forelse ($item->categories as $category)
                                                        {{ $category->name }}
                                                    @empty
                                                        <span>no category</span>
                                                    @endforelse
                                                </td>

                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $item->platform }}</td>

                                                <td scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 tracking-wider gap-2">

                                                    <a href="{{ route('topup-package.edit', $item->id) }}"
                                                        class="text-blue-500 hover:text-blue-400"><i class="fa-solid fa-pen-to-square mx-1"></i>Edit
                                                    </a>
                                                    <a href="{{ route('topup-package.destroy', $item->id) }}"
                                                        class="text-red-500 hover:text-red-400"
                                                        data-confirm-delete="true"><i class="fa fa-trash mx-1"></i>Delete</a>

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
