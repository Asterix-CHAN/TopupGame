<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3 ml-4">
            {{ __('Gallery') }}
        </h2>
    </x-slot>


    <main>
        <!-- Begin Page Content -->
        <div class="container-fluid pt-10">
            <!-- Page Heading -->
            <div class="container mx-auto">
                <div class="flex flex-col">
                    {{-- sm:-mx-6 lg:-mx-8 --}}
                    <div class="overflow-x-auto ">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">

                            <div class="col-lg-12 mb-4 flex justify-end gap-4">
                            <div x-data="{ isOpen: false }" class="relative ...">
                                <x-secondary-button @click="isOpen = !isOpen">{{ __('Tambah Kategori') }}
                                </x-secondary-button>

                                <div x-show="isOpen"
                                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                                    <div class="rounded-md bg-white shadow-xs">
                                        @include('pages.admin.category.modal-category')
                                    </div>
                                </div>
                            </div>
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
                                                Category</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Platform</th>
                                            <th scope="col"
                                                class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 items-center">
                                        @forelse ($datas as $item)
                                            <tr>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $item->id }}</td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $item->name }}</td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                
                                                </td>
                                            
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase flex items-center justify-center gap-2 my-10">
                                                    <a href="#"
                                                        class="p-2 bg-blue-500 hover:bg-blue-600 rounded-lg text-white"><i
                                                            class="fa fa-pencil-alt mx-1"></i>
                                                    </a>
                                                    <a href="{{ route('category.destroy', $item->id) }}"
                                                        class="p-2 bg-red-500 hover:bg-red-600 rounded-lg text-white"
                                                            data-confirm-delete="true"
                                                            type="submit"><i class="fa fa-trash mx-1"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Data Kosong</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


</x-app-layout>
