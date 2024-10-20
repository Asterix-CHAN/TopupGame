<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('game-packages.show', $items) }}

        <div class="md:container mx-auto sm:px-8 lg:px-10">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Produk Diamond') }}
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

                            {{-- Button Add Data --}}
                            <div class="col-lg-12 mb-4 flex justify-end">
                                <form action="{{ route('product-packages.create', $items->uuid) }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <x-secondary-button type='submit'> <i
                                            class="fa-solid fa-folder-plus mr-2"></i>{{ __('Tambah Produk Diamond') }}</x-secondary-button>
                                </form>
                            </div>

                            <div class="overflow-hidden shadow-md sm:rounded-lg flex flex-row gap-3">
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
                                                Diamond</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action</th>
                                        </tr>
                                    </thead>


                                    <tbody class="bg-white divide-y divide-gray-200 items-center">
                                        @forelse ($diamonds as $index=>$item)
                                            <tr>
                                                <td
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $item->game_packages->name }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $item->diamond }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Rp. {{ $item->price }}
                                                </td>

                                                <td
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 tracking-wider gap-2 flex flex-col items-end ">
                                                    <a href="" class="text-blue-600 hover:text-blue-400">
                                                        <i
                                                            class="fa-solid fa-pen-to-square mx-1"></i>{{ __('Edit') }}
                                                    </a>

                                                    <form action="{{ route('event.createEvent', $item->uuid) }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="submit"
                                                            class="text-green-600 hover:text-green-400">
                                                            <i
                                                                class="fa-solid fa-calendar-plus mx-1"></i>{{ __('Tambah Event') }}
                                                        </button>
                                                    </form>

                                                    <a href="" class="text-red-600 hover:text-red-400"
                                                        data-confirm-delete="true">
                                                        <i class="fa fa-trash mx-1"></i>{{ __('Delete') }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Data Kosong</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                {{-- <table class="w-1/2 divide-y divide-gray-200 items-center">
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
                                                Diamond Event</th>
                    
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action</th>
                                        </tr>
                                    </thead>


                                    <tbody class="bg-white divide-y divide-gray-200 items-center">
                                        @forelse ($events as $index=>$event)
                                            <tr>
                                                <td
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $event->game_packages->name }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $event->diamond_event }}
                                                </td>
                                                <td
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{ $event->price }}
                                                </td>

                                                <td
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 tracking-wider gap-2">
                                                    <a href="" class="text-blue-600 hover:text-blue-400">
                                                        <i
                                                            class="fa-solid fa-pen-to-square mx-1"></i>{{ __('Edit') }}
                                                    </a>
                                                    <a href="" class="text-red-600 hover:text-red-400"
                                                        data-confirm-delete="true">
                                                        <i class="fa fa-trash mx-1"></i>{{ __('Delete') }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Data Kosong</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </main>








</x-app-layout>
