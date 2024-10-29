<x-app-layout>
    <x-slot name="header">
        <div class="md:container mx-auto sm:px-8 lg:px-10">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Transaction') }}
            </h2>
        </div>
    </x-slot>


    <main>
        <!-- Begin Page Content -->
        <div class="container-fluid pt-10">
            <!-- Page Heading -->
            <div class="md:container w-full ">
                <div class="flex flex-col w-full">
                    {{-- sm:-mx-6 lg:-mx-8 --}}
                    <div class="overflow-x-auto ">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">

                            {{-- <div class="col-lg-12 mb-4 flex justify-end">
                                <a href="{{ route('product-packages.create', $items->id) }}"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-slate-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">{{ __('Tambah Produk') }}</a>
                            </div> --}}

                            <div class="shadow-md sm:rounded-lg">
                                <table
                                    class="min-w-full overflow-scroll divide-y divide-gray-200 items-center table-auto">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase ">
                                                Order Id</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                                Date-time</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                                Name Game</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                                Price</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                                Diamond</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                                Transaction Status</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 items-center">
                                        @forelse ($items as $item)
                                            <tr>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase  overflow-x-auto">
                                                    {{ $item->uuid }}</td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">

                                                    {{ $item->updated_at }}
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                                    <a href="" class="hover:text-blue-600">
                                                        {{ $item->game->name }}</a>
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3  text-center  rounded-lg  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                    Rp. {{ $item->price }}
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3  text-center  rounded-lg  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                    {{ $item->diamond_total }}
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3  text-center  rounded-lg  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                                    <span
                                                        class="px-2 py-1 rounded-xl text-white font-semibold {{ $item->transaction_status == 'in_cart'
                                                            ? 'bg-yellow-500'
                                                            : ($item->transaction_status == 'PENDING'
                                                                ? 'bg-orange-500'
                                                                : ($item->transaction_status == 'SUCCESS'
                                                                    ? 'bg-green-500'
                                                                    : ($item->transaction_status == 'FAILED'
                                                                        ? 'bg-red-500'
                                                                        : ($item->transaction_status == 'CANCEL'
                                                                            ? 'bg-red-700'
                                                                            : ($item->transaction_status == 'EXPIRE'
                                                                                ? 'bg-blue-900'
                                                                                : 'bg-red-700'))))) }}">
                                                        {{ $item->transaction_status }}
                                                    </span>
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3 items-end  text-center text-xs font-medium text-gray-500 tracking-wider gap-1">
                                                    {{-- Product --}}
                                                    <a href=""
                                                        class="text-orange-500 hover:text-orange-400 flex flex-row">
                                                        <i class="fa-solid fa-info mx-1"></i>Detail
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
