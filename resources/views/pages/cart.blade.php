@extends('layouts.game.order')

@section('title', 'cart')

@section('content')
    <section class="pt-24 antialiased dark:bg-gray-900 pb-16 ">
        <div class="md:container mx-auto min-w-screen-xl px-4 2xl:px-0  items-center">
            <h2 class="text-xl font-semibold text-white dark:text-white sm:text-2xl">Shopping Cart</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 md:flex md:flex-row md:items-start lg:gap-8">
                <div class="mx-auto w-full flex-none md:w-2/3 xl:max-w-4xl ">
                    {{-- Add DATA --}}
                    {{-- @forelse ($transactions as $transaction)
                    <div class="space-y-6">
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                <a href="#" class="shrink-0 md:order-1">
                                    <img class="h-20 w-20 dark:hidden"
                                        src="{{ Storage::url($transaction->game->first()->image) }}"
                                        alt="imac image" />
                                </a>

                                <label for="counter-input" class="text-black">Choose quantity:</label>
                                <div class="flex items-center justify-between md:order-3 md:justify-end">
                                    <div class="flex items-center">
                                        <button type="button" id="decrement-button"
                                            data-input-counter-decrement="counter-input"
                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <input type="text" id="counter-input" data-input-counter
                                            class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white"
                                            placeholder="" value="2" required />
                                        <button type="button" id="increment-button"
                                            data-input-counter-increment="counter-input"
                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="text-end md:order-4 md:w-32">
                                        <p class="text-base font-bold text-gray-900 dark:text-white">{{ $transaction->price }}</p>
                                    </div>
                                </div>

                                <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                    <a href="#"
                                        class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $transaction->game->name }}</a>

                                    <div class="flex items-center gap-4">
                                        <button type="button"
                                            class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                            </svg>
                                            Add to Favorites
                                        </button>

                                        <button type="button"
                                            class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    @empty
                        
                    @endforelse --}}

                    @forelse ($transactions as $transaction)
                        @if ($transaction->transaction_status == 'IN_CART')
                            <div
                                class="rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800 md:p-6 shadow-lg mb-2 transition-all">
                                <label class="cursor-pointer flex flex-row items-center w-full">
                                    <input type="radio" name="option" class="peer transaction-radio"
                                        data-uuid="{{ $transaction->uuid }}" data-price="{{ $transaction->price }}"
                                        data-uid="{{ $transaction->uid_game }}" data-zone="{{ $transaction->server_game }}"
                                        data-diamond="{{ $transaction->diamond_total }}"
                                        data-username="{{ $transaction->user->name }}" />

                                    <div
                                        class="flex flex-col w-full ml-2 peer-checked:bg-blue-50 peer-checked:border-blue-600 peer-checked:border peer-checked:border-lg rounded-lg p-4">
                                        <div
                                            class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                            <div class="shrink-0 md:order-1 flex flex-col gap-2">
                                                <div class="flex flex-row items-center gap-2">
                                                    <img class="h-14 w-14 dark:hidden object-cover object-center rounded-lg"
                                                        src="{{ Storage::url($transaction->game->image) }}"
                                                        alt="game image" />
                                                    <div class="flex flex-col text-xs font-sans">
                                                        <span>{{ $transaction->game->name }}</span>
                                                        <span>{{ $transaction->game->developer }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex items-center justify-end order-3 space-x-4">
                                                <div class="text-end md:w-32">
                                                    <p class="text-base font-bold dark:text-white">Rp.
                                                        {{ $transaction->price }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full mt-2 space-y-4 md:order-2">
                                            <div class="overflow-x-auto px-2">
                                                <table class="w-full border border-lg rounded-lg ">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                                User Id</th>
                                                            <th
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                                Zone Id</th>
                                                            <th
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                                Diamond</th>
                                                            <th
                                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                                Username</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                                {{ $transaction->uuid }}</td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                                {{ $transaction->server_game }}</td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                                {{ $transaction->diamond_total }}</td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                                {{ $transaction->user->name }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @endif
                    @empty
                        <p class="text-center text-white font-semibold">No transactions found</p>
                    @endforelse
                    {{-- End Add DATA --}}

                </div>

                {{-- Transaction --}}
                <div class="mx-auto md:w-1/3 md:top-24 md:pb-2 md:sticky mt-6 max-w-4xl flex-1 space-y-6 md:mt-0">
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

                        <div id="summary" class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Price</dt>
                                    <dd id="price" class="text-base font-medium text-gray-900 dark:text-white">-</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">User ID</dt>
                                    <dd id="uid" class="text-base font-medium text-gray-900 dark:text-white">-</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Zone ID</dt>
                                    <dd id="zone" class="text-base font-medium text-gray-900 dark:text-white">-</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Diamond</dt>
                                    <dd id="diamond" class="text-base font-medium text-gray-900 dark:text-white">-</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Username</dt>
                                    <dd id="username" class="text-base font-medium text-gray-900 dark:text-white">-</dd>
                                </dl>
                            </div>
                        </div>
                        @if ($transactions->isEmpty())
                            <form>
                                @csrf
                                @method('GET')
                                <button disabled
                                    class="flex  bg-gray-500 cursor-not-allowed w-full items-center justify-center rounded-lg  px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-orange-800">Proceed
                                    to Checkout</button>
                            </form>
                        @else
                            <form id="checkoutForm" action="{{ route('transaction.show', $transaction->uuid) }}" method="get">
                                @csrf
                                @method('GET')
                                <p id="uuid"></p>
                                <button
                                    class="flex w-full items-center justify-center rounded-lg bg-orange-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-orange-800">Proceed 
                                    to Checkout</button>
                            </form>
                        @endif


                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>

                            <a href="{{ route('home') }}" title=""
                                class="inline-flex items-center gap-2 text-sm font-medium text-orange-500 underline hover:no-underline dark:text-blue-500">
                                Continue Shopping
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Transaction Details Form -->
                    {{-- <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <form class="space-y-4">
                            <div>
                                <label for="voucher"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Do you have a
                                    voucher or gift card?</label>
                                <input type="text" id="voucher"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="" required />
                            </div>

                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-orange-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-orange-800">Apply
                                Code</button>
                        </form>
                    </div> --}}
                </div>

                {{-- Transaction --}}
            </div>

            {{-- Also Buy --}}
            <div class=" mt-8 block">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
                <div class="mt-6 grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4 md:mt-8">


                    <div
                        class="min-h-[50px] max-h-[400px] overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <a href="#" class="overflow-hidden rounded">
                            <img class="mx-auto h-20 w-20 md:h-32 md:w-32 dark:hidden relative rounded-lg object-cover object-center"
                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="imac image" />
                        </a>
                        <div>
                            <a href="#"
                                class="text-lg md:text-xl font-semibold leading-tight text-gray-900 hover:underline dark:text-white">iMac
                                27”</a>
                            {{-- <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation
                            has some improvements, including a longer continuous battery life.</p> --}}
                        </div>
                        <div>
                            <p class="text-sm md:text-lg font-semibold text-gray-900 dark:text-white">
                                <span class="line-through"> $399,99 </span>
                            </p>
                            <p class="text-lg md:text-xl font-bold leading-tight text-red-600 dark:text-red-500">$299
                            </p>
                        </div>
                        <div class="mt-6 flex items-start md:items-center gap-2.5 flex-col md:flex-row">
                            <button data-tooltip-target="favourites-tooltip-1" type="button"
                                class="inline-flex  items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z">
                                    </path>
                                </svg>
                            </button>
                            <div id="favourites-tooltip-1" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Add to favourites
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <button type="button"
                                class="inline-flex w-full items-center justify-center rounded-lg  px-5 py-2.5 text-sm font-medium bg-orange-500  text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-blue-300 ">
                                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                </svg>
                                Add to cart
                            </button>
                        </div>
                    </div>

                    <div
                        class="min-h-[50px] max-h-[400px] overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <a href="#" class="overflow-hidden rounded">
                            <img class="mx-auto h-20 w-20 md:h-32 md:w-32 dark:hidden relative rounded-lg object-cover object-center"
                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                alt="imac image" />
                        </a>
                        <div>
                            <a href="#"
                                class="text-xs md:text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">iMac
                                27”</a>
                            {{-- <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation
                            has some improvements, including a longer continuous battery life.</p> --}}
                        </div>
                        <div>
                            <p class="text-sm md:text-lg font-semibold text-gray-900 dark:text-white">
                                <span class="line-through"> $399,99 </span>
                            </p>
                            <p class="text-lg md:text-xl font-bold leading-tight text-red-600 dark:text-red-500">$299
                            </p>
                        </div>
                        <div class="mt-6 flex items-start md:items-center gap-2.5 flex-col md:flex-row">
                            <button data-tooltip-target="favourites-tooltip-1" type="button"
                                class="inline-flex  items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z">
                                    </path>
                                </svg>
                            </button>
                            <div id="favourites-tooltip-1" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Add to favourites
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <button type="button"
                                class="inline-flex w-full items-center justify-center rounded-lg  px-5 py-2.5 text-sm font-medium bg-orange-500  text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-blue-300 ">
                                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                </svg>
                                Add to cart
                            </button>
                        </div>
                    </div>

                    <div
                        class="min-h-[50px] max-h-[400px] overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <a href="#" class="overflow-hidden rounded">
                            <img class="mx-auto h-20 w-20 md:h-32 md:w-32 dark:hidden relative rounded-lg object-cover object-center"
                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                alt="imac image" />
                        </a>
                        <div>
                            <a href="#"
                                class="text-xs md:text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">iMac
                                27”</a>
                            {{-- <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation
                        has some improvements, including a longer continuous battery life.</p> --}}
                        </div>
                        <div>
                            <p class="text-sm md:text-lg font-semibold text-gray-900 dark:text-white">
                                <span class="line-through"> $399,99 </span>
                            </p>
                            <p class="text-lg md:text-xl font-bold leading-tight text-red-600 dark:text-red-500">$299
                            </p>
                        </div>
                        <div class="mt-6 flex items-start md:items-center gap-2.5 flex-col md:flex-row">
                            <button data-tooltip-target="favourites-tooltip-1" type="button"
                                class="inline-flex  items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z">
                                    </path>
                                </svg>
                            </button>
                            <div id="favourites-tooltip-1" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Add to favourites
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <button type="button"
                                class="inline-flex w-full items-center justify-center rounded-lg  px-5 py-2.5 text-sm font-medium bg-orange-500  text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-blue-300 ">
                                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                </svg>
                                Add to cart
                            </button>
                        </div>


                    </div>

                </div>
            </div>
            {{-- eND Buy --}}
        </div>
    </section>
    @push('bottom-addon-script')
        <script>
            document.querySelectorAll('.transaction-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                    const price = this.dataset.price;
                    const uid = this.dataset.uid;
                    const zone = this.dataset.zone;
                    const diamond = this.dataset.diamond;
                    const username = this.dataset.username;
                    const uuid = this.dataset.uuid;

                    document.getElementById('price').textContent = `Rp. ${price}`;
                    document.getElementById('uid').textContent = uid;
                    document.getElementById('zone').textContent = zone;
                    document.getElementById('diamond').textContent = diamond;
                    document.getElementById('username').textContent = username;
                    document.getElementById('uuid').textContent = uuid;

                    console.log(uuid);
                });
            });

            document.addEventListener('DOMContentLoaded', () => {
                const checkoutForm = document.getElementById('checkoutForm');
                const transactionRadios = document.querySelectorAll('.transaction-radio');

                // Listen for form submission
                checkoutForm.addEventListener('submit', (event) => {
                    // Prevent default submission
                    event.preventDefault();

                    // Find the selected radio
                    const selectedRadio = Array.from(transactionRadios).find(radio => radio.checked);

                    if (selectedRadio) {
                        // Get UUID from the selected radio
                        const uuid = selectedRadio.getAttribute('data-uuid');

                        // Append UUID to the form's action URL
                        checkoutForm.action = `{{ route('transaction.show', '') }}/${uuid}`;

                        // Submit the form
                        checkoutForm.submit();
                    } else {
                        alert('Please select a transaction before proceeding to checkout.');
                    }
                });
            });
        </script>
    @endpush

@endsection
