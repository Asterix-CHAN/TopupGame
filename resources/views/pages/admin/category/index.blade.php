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
                                      
                                        {{-- Modal Create --}}
                                        <x-secondary-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'modal-create-category')">
                                            {{ __('Tambah Category') }}
                                        </x-secondary-button>

                                        <x-modal name="modal-create-category">
                                            <div
                                                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 my-auto">
                                                    <div class=" w-full">

                                                        <form method="post" action="{{ route('category.store') }}">
                                                            @csrf
                                                            <div class="card">
                                                                <div class="card-body flex gap-2">
                                                                    <div class="w-full">
                                                                        <div class="mb-4">
                                                                            <label
                                                                                class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                                                                            <x-text-input type="text" name="name"
                                                                                value="{{ old('name') }}"
                                                                                placeholder="Category"></x-text-input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="mt-6 flex bg-gray-50 px-4 py-3 sm:flex sm:flex-row gap-2 justify-end sm:px-6">
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
                                        {{-- Modal Create --}}

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
                                        {{-- Modal Create --}}
                                        <x-secondary-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'modal-create-platfrom')">
                                            {{ __('Tambah Platform') }}
                                        </x-secondary-button>
                                        <x-modal name="modal-create-platfrom">
                                            <div
                                                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 my-auto">
                                                    <div class=" w-full">

                                                        <form method="post" action="{{ route('platform.store') }}">
                                                            @csrf
                                                            <div class="card">
                                                                <div class="card-body flex gap-2">
                                                                    <div class="w-full">

                                                                        <div class="mb-4">
                                                                            <label
                                                                                class="block text-gray-700 text-sm font-bold mb-2">Platform</label>
                                                                            <x-text-input type="text" name="name"
                                                                                value="{{ old('name') }}"
                                                                                placeholder="Platform"></x-text-input>
                                                                            @error('name')
                                                                                <x-input-error
                                                                                    :messages="$message"></x-input-error>
                                                                            @enderror
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="mt-6 flex bg-gray-50 px-4 py-3 sm:flex sm:flex-row gap-2 justify-end sm:px-6">
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
                                        {{-- Modal Create --}}
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
