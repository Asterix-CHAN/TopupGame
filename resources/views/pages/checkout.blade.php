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
                                        <p class="text-base font-bold  dark:text-white">Rp.
                                            {{ number_format($items->price, 0, ',', '.') }}
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
                                        {{ $midtrans->payment_type }}</h3>

                                    <p class="text-xs md:text-lg mt-1">Biaya Admin: Rp 0</p>
                                </div>
                            </div>

                            <div class="text-center justify-center px-4 flex flex-col items-end relative  my-1 ">
                                {{-- <button onclick="Livewire.dispatch('openModal', { component: 'edit-user', arguments: { user: {{ $user->id }} }})">Edit User</button> --}}

                                <x-secondary-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'payment-method')"
                                    class="h-[60px] rounded-lg font-extrabold text-blue-500 hover:text-white hover:bg-blue-500">
                                    GANTI
                                </x-secondary-button>

                                <x-modal name="payment-method">
                                    <div class=" flex items-center justify-center">
                                        <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-6">
                                            <!-- Header -->
                                            <div class="flex justify-between items-center border-b pb-4 mb-4">
                                                <h2 class="text-lg font-semibold">Pilih Metode Pembayaran</h2>
                                                <button x-on:click.prevent="$dispatch('close-modal', 'payment-method')"
                                                    class="text-gray-500 hover:text-gray-700">&times;</button>
                                            </div>

                                            <!-- Tabs -->
                                            <div class="flex flex-wrap gap-2 border-b pb-4 mb-4">
                                                <button
                                                    class="px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg focus:outline-none">e-Wallet</button>
                                                <button
                                                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">QR
                                                    Code</button>
                                                <button
                                                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">Kartu
                                                    Kredit/Debit</button>
                                                <button
                                                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">Transfer
                                                    Virtual Account</button>
                                                <button
                                                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">Gerai
                                                    Retail</button>
                                                <button
                                                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">Cicilan</button>
                                            </div>

                                            <!-- Form -->
                                            <form action="{{ route('checkout.paymentMethod', $items->uuid) }}"
                                                method="POST">
                                                @csrf
                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                                    @foreach ($payments as $payment)
                                                        <label
                                                            class="flex items-center border rounded-lg p-4 cursor-pointer ">
                                                            <!-- Input Radio -->
                                                            <input type="radio" name="payment_type"
                                                                value="{{ $payment->payment_type }}" class="hidden peer" required>
                                                            <!-- Label Content -->
                                                            <div
                                                                class="flex items-center space-x-4 peer-checked:border-blue-500 peer-checked:ring-2 peer-checked:ring-blue-300 peer-checked:ring-offset-2">
                                                                <img src="{{ Storage::url($payment->image) }}"
                                                                    alt="Payment Logo"
                                                                    class="w-10 h-10 object-contain object-center ">
                                                                <div>
                                                                    <p class="text-sm font-medium">{{ $payment->name }}</p>
                                                                    <p class="text-sm text-gray-500">Biaya: IDR
                                                                        {{ number_format($payment->cost, 0, ',', '.') }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    @endforeach
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="mt-6">
                                                    <button type="submit"
                                                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                                                </div>
                                            </form>
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
