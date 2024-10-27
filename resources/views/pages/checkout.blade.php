@extends('layouts.game.order')

@section('title', 'checkout')

@section('content')
    <section class=" pt-24 antialiased dark:bg-gray-900 pb-16 ">
        <div class="md:container mx-auto min-w-screen-xl px-4 2xl:px-0  items-center">
            <h2 class="text-xl font-semibold  dark:text-white sm:text-2xl text-white">Pembayaran</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 md:flex md:items-start lg:gap-8 relative ">
                {{-- Left Side --}}
                <div class="mx-auto w-full md:w-2/3 flex-none mb-3 ">
                    {{-- Detail --}}
                    <div class="space-y-6">
                        {{-- Card Produk --}}
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 md:p-6 shadow-lg ">
                            <div class="pl-2 space-y-4 md:flex md:items-center  md:justify-between md:gap-6 md:space-y-0">
                                <div class="shrink-0 md:order-1 flex flex-col gap-2  ">
                                    <div class="flex flex-row items-center gap-2 ">
                                        <img class="h-14 w-14 dark:hidden object-cover object-center rounded-lg"
                                            src="{{ Storage::url($items->game->image) }}" alt="imac image" />
                                        <div class="flex flex-col text-xs font-sans">
                                            <span>{{ $items->game->name }}</span>
                                            <span>{{ $items->game->developer }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- <label for="counter-input" class="sr-only">Choose quantity:</label> --}}
                                <div class="flex items-center justify-end order-3 ">
                                    <div class="text-end order-4 md:w-32">
                                        <p class="text-base font-bold  dark:text-white">Rp. {{ $items->price }}
                                        </p>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full min-w-0 flex-1 mt-2 space-y-4 md:order-2  ">
                                <div class="card w-full overflow-x-auto px-2">
                                    <table class="w-full border border-separate rounded-lg">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                    User Id</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                    Zone Id</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                    Diamond</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                    Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    {{ $items->uid_game }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    {{ $items->server_game }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    {{ $items->diamond_total }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    {{ $items->user->name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="flex items-center gap-4">
                                    <form action="{{ route('checkout.delete', $items->uuid) }}" method="POST"
                                        class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                        @csrf
                                        @method('POST')
                                        <x-primary-button>
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                            Remove
                                        </x-primary-button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        {{-- End Card Produk --}}

                    </div>

                    {{-- Method Payment --}}
                    <div class="space-y-6 pt-4">
                        <h2 class="text-xl font-semibold  dark:text-white sm:text-2xl text-white">Metode Pembayaran</h2>
                        {{-- Card Payment Method --}}
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 md:p-6 shadow-lg grid grid-cols-3  gap-4">
                            <div
                                class="col-span-2 items-center px-4 flex relative md:gap-3 md:rounded-xl md:p-3 border-2 h-[80px] my-1 ">
                                <div class="w-[70px] h-[70px] relative rounded-xl">
                                    <img src="{{ url('Game/src/images/logo/gopay.png') }}" alt="Game Logo"
                                        class="aspect-square h-full w-full rounded-lg !object-contain !object-center md:rounded-xl left-0 bg-white p-1">
                                </div>
                                <div class="relative flex w-full flex-col  justify-start text-start pl-2">
                                    <h3 class="truncate text-md font-semibold  md:text-xl">
                                        Gopay</h3>
                                    <p class="text-xs md:text-lg mt-1">Rp. {{ $items->price}}</p>
                                </div>
                            </div>

                            <div class="text-center justify-center px-4 flex flex-col items-end relative  my-1 ">
                                <x-secondary-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'method-payment')"
                                    class="h-[60px] rounded-lg font-extrabold text-blue-500 hover:text-white hover:bg-blue-500">
                                    GANTI
                                </x-secondary-button>

                                <x-modal name="method-payment">
                                    <div
                                        class="inset-0 items-center h-[600px] w-[800px] bg-white shadow-xl rounded-lg pb-2 scroll-m-0">
                                        <div class="pt-3">
                                            <h2 class="text-2xl text-start pl-2 font-bold text-gray-900">
                                                {{ __('Pilih Metode Pembayaran') }}
                                            </h2>
                                            <hr class=" border border-slate-200 " />
                                        </div>

                                        <div class="p-6">

                                            <hr class=" border border-slate-200 " />

                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Cancel') }}
                                                </x-secondary-button>

                                                <x-primary-button class="ms-3">
                                                    {{ __('Simpan') }}
                                                </x-primary-button>
                                            </div>
                                        </div>
                                    </div>
                                </x-modal>
                            </div>


                        </div>
                        {{-- End Card Payment Method --}}

                    </div>

                </div>

                {{-- Right Side --}}
                @include('pages.card-checkout')

            </div>
        </div>
    </section>
@endsection
