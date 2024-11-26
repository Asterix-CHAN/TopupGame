<div class="mx-auto  w-full md:w-1/3 flex-1 space-y-6 md:top-24 lg:mt-0 md:sticky shadow-lg">
    <div
        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
        <p class="text-xl font-semibold  dark:text-white">Detail Pembayaran</p>

        <div class="space-y-4">
            <div class="space-y-2">
                <form action="{{ route('checkout.payment', $items->uuid) }}" method="POST" >
                    @csrf
                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Harga</dt>
                    <dd class="text-base font-medium  dark:text-white">Rp {{ number_format($items->price, 0, ',', '.') }}</dd>
                </dl>

                {{-- <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total Pesanan</dt>
                    <dd class="text-base font-medium text-green-600">-$299.00</dd>
                </dl> --}}

                {{-- <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                    <dd class="text-base font-medium  dark:text-white">$99</dd>
                </dl> --}}

                {{-- <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                    <dd class="text-base font-medium text-green-600">-$299.00</dd>
                </dl> --}}

                {{-- <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                    <dd class="text-base font-medium  dark:text-white">$799</dd>
                </dl> --}}

            </div>

            <dl
                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                <dt class="text-base font-bold  dark:text-white">Total Pembayaran</dt>
                <dd class="text-base font-bold  dark:text-white">Rp. {{ number_format($items->price, 0, ',', '.') }}</dd>
                {{-- {{ $items->detail->first()->total_amount }} --}}
            </dl>

            <dl
                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                <dt class="text-base font-semibold  dark:text-white">Metode Pembayaran</dt>
                <dd class="text-base font-semibold  dark:text-white">QRIS</dd>
            </dl>
        </div>

        <button type="submit" 
            class="flex w-full items-center justify-center rounded-lg bg-orange-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-orange-700 focus:outline-none focus:ring-4 focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Bayar</button>
        </form>

       


        <div class="flex items-center justify-center gap-2">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
            <a href="#" title=""
                class="inline-flex items-center gap-2 text-sm font-medium text-orange-500 underline hover:no-underline dark:text-orange-500">
                Continue Shopping
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>
    </div>

    <div
        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
        <form class="space-y-4">
            <div>
                <label for="voucher" class="mb-2 block text-sm font-medium  dark:text-white"> Do you have
                    a
                    voucher or gift card? </label>
                <input type="text" id="voucher"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm  focus:border-orange-500 focus:ring-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-orange-500 dark:focus:ring-orange-500"
                    placeholder="" required />
            </div>
            <button type="submit"
                class="flex w-full items-center justify-center rounded-lg bg-orange-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Apply
                Code</button>
        </form>
    </div>
</div>