<x-app-layout>
    <x-slot name="header">
        <div class="md:container mx-auto sm:px-8 lg:px-10">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Metode Pembayaran') }}
            </h2>
        </div>
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

                            <div class="col-lg-12 mb-4 flex justify-end">
                                <x-secondary-button
                                    onclick="Livewire.dispatch('openModal', { component: 'payment-method.create' })">Tambah Pembayaran</x-secondary-button>

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
                                                Image</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Payment Type</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Biaya</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 items-center">
                                        @forelse ($items as $index=>$item)
                                            <tr>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                                    <img src="{{ Storage::url($item->image) }}" alt=""
                                                        class="object-contain w-16 aspect-square rounded-lg object-center">
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3  text-left  rounded-lg  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                    {{ $item->name }}
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3  text-left  rounded-lg  text-xs font-medium text-gray-500  tracking-wider ">
                                                    {{ $item->payment_type }}
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3  text-left  rounded-lg  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                    Rp. {{ number_format($item->cost, 0, ',', '.') }}
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 tracking-wider gap-2">

                                                    <a href="" class="text-blue-600 hover:text-blue-400 "><i
                                                            class="fa-solid fa-pen-to-square mx-1"></i>
                                                    </a>
                                                    <a href="" class="text-red-600 hover:text-red-400 "
                                                        data-confirm-delete="true"><i
                                                            class="fa fa-trash mx-1"></i>Delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Data Kosong</td>
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
