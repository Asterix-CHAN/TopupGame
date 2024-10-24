<x-app-layout>

    <x-slot name="header">
        <div class="md:container mx-auto sm:px-8 lg:px-10">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Category') }}
            </h2>
        </div>
    </x-slot>


    <main>
        <!-- Begin Page Content -->
        <div class="container-fluid px-2 md:px-0 pt-10">
            <!-- Page Heading -->
            <div class="md:container mx-auto">
                <div class="flex flex-col">
                    {{-- sm:-mx-6 lg:-mx-8 --}}
                    <div class="overflow-x-auto ">
                        <div class=" min-w-full relative py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto flex flex-col md:flex-row gap-6">

                                {{-- Category --}}
                                <div class="md:w-1/2 w-full py-5">
                                    <div class="col-lg-12 mb-4 flex justify-end gap-4">
                                        <div x-data="{ isOpen: false }" class="relative ...">
                                            <x-secondary-button @click="isOpen = !isOpen">{{ __('Tambah Kategori') }}
                                            </x-secondary-button>

                                            <div x-show="isOpen"
                                                class="origin-top-right inset-0 absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                                                <div class="rounded-md bg-white shadow-xs">
                                                    @include('pages.admin.category.modal-category')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="min-w-full divide-y divide-gray-200 items-center drop-shadow-lg">
                                        <thead class="bg-gray-50 ">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Category</th>
                                                <th scope="col"
                                                    class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                                    Action</th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-200 items-center">
                                            @forelse ($datas as $index=>$data)
                                                <tr>
                                                    <td scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        {{ $index + 1 }}</td>
                                                    <td scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        {{ $data->name }}</td>
                                                    <td scope="col"
                                                        class="px-6 py-3 items-end flex flex-col text-xs font-medium text-gray-500 tracking-wider gap-2">
                                                        <a href="{{ route('category.edit', $data->slug) }}"
                                                            class="text-blue-600 hover:text-blue-400 "><i
                                                                class="fa-solid fa-pen-to-square mx-1"></i>{{ __('Edit') }}
                                                        </a>
                                                        <a href="{{ route('category.destroy', $data->slug) }}"
                                                            class="text-red-600 hover:text-red-400 "
                                                            data-confirm-delete="true"><i
                                                                class="fa fa-trash mx-1"></i>Delete</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">Data Kosong</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                {{-- End Category --}}

                                {{-- Platform --}}
                                <div class="md:w-1/2 w-full py-5">
                                    <div class="col-lg-12 mb-4 flex justify-end gap-4">
                                        <div x-data="{ isOpen: false }" class="relative ...">
                                            <x-secondary-button @click="isOpen = !isOpen">{{ __('Tambah Platform') }}
                                            </x-secondary-button>

                                            <div x-show="isOpen"
                                                class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                                                <div class="rounded-md bg-white shadow-xs">
                                                    @include('pages.admin.category.modal-platform')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="min-w-full divide-y divide-gray-200 items-center drop-shadow-lg">
                                        <thead class="bg-gray-50 ">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Platform</th>
                                                <th scope="col"
                                                    class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
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
                                                        class="px-6 py-3 items-end flex flex-col text-xs font-medium text-gray-500 tracking-wider gap-2">

                                                        <a href="{{ route('platform.edit', $item->slug) }}"
                                                            class="text-blue-600 hover:text-blue-400 "><i
                                                                class="fa-solid fa-pen-to-square mx-1"></i>{{ __('Edit') }}
                                                        </a>
                                                        <a href="" class="text-red-600 hover:text-red-400 "
                                                            data-confirm-delete="true"><i
                                                                class="fa fa-trash mx-1"></i>Delete</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Data Kosong</td>
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
        </div>
    </main>


</x-app-layout>
