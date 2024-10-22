<div id="offcanvas"
    class="w-full px-4 py-6 rounded-lg rounded-b-none md:rounded-lg md:relative md:z-10 bg-slate-500 shadow-md shadow-slate-700 flex h-auto fixed bottom-0 left-0 right-0 translate-y-full transition-transform duration-300 ease-in-out  md:translate-y-0 md:flex md:flex-col z-40">
    <div class=" px-4 relative flex flex-col w-full">

        <button id="close-offcanvas" class="md:hidden text-right text-white">
            <i class="fa-solid fa-xmark text-2xl"></i>
        </button>
        <form action="{{ route('order_process', $item->slug) }}" method="POST" id="shipping-detail">
            @csrf
            <!-- Total Diamond (hidden field) -->
            <div class="flex flex-col mb-4 w-full">
                <p id="topup" class="text-white font-semibold">Informasi Pesanan</p>
                <input data-input id="topup-value" type="hidden" value="" name="diamond_total" required />
            </div>

            <!-- Input ID User -->
            <div class="flex flex-col mb-4 w-full">
                <label for="id-user" class="text-sm md:text-lg font-semibold mb-2">
                    ID
                </label>
                <input data-input type="text" id="id-user" name="uid_game"
                    class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-small focus:border-blue-200 focus:outline-none"
                    placeholder="Masukkan User ID..." />
                @error('uid_game')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Server User -->
            <div class="flex flex-col mb-4 w-full">
                <label for="server-user" class="text-sm md:text-lg font-semibold mb-2">
                    Server
                </label>
                <input data-input type="text" id="server-user" name="server_game"
                    class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-small focus:border-blue-200 focus:outline-none"
                    placeholder="Masukkan User Server..." />
                @error('server_game')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Phone Number -->
            <div class="flex flex-col mb-4 w-full">
                
                <label for="phone-number" class="text-sm md:text-lg font-semibold mb-2">
                    Nomor WhatsApp
                </label>
                
                <input data-input type="tel" id="phone-number" name="phone_number"
                    class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-small focus:border-blue-200 focus:outline-none"
                    placeholder="+62" />
                @error('phone_number')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Total -->
            <div class="mb-4 w-full h-auto">
                <label class="text-sm md:text-lg font-semibold mb-2 gap-y-2 text-white">
                    Total
                </label>
                <p id="price-list" class="right-0 text-base md:text-lg text-white"></p>
                <input data-input id="topup-price" type="hidden" value="" name="total_amount" required />
            </div>

            <!-- Tombol -->
            @auth
                <div class="w-full">
                    <button disabled type="submit" id="button-beli"
                        class="bg-slate-800 text-white focus:bg-sky-500 focus:outline-none w-full py-2 md:rounded-2xl rounded-lg text-base md:text-lg focus:text-sky-700 transition-all duration-200 px-6 mx-auto items-center">
                        <i class="fa-solid fa-cart-shopping mr-2"></i>Beli
                    </button>
                </div>
            @endauth
        </form>


        @guest
            <a href="{{ route('login') }}"
                class="bg-cyan-900 hover:bg-cyan-600 text-white focus:bg-sky-800 focus:outline-none md:w-full py-2 md:rounded-2xl rounded-lg text-xs md:text-base text-center focus:text-white transition-all duration-200 px-6 mx-auto items-center">
                Login atau Register Untuk Transaksi
            </a>
        @endguest

        <!-- Tombol -->
    </div>
</div>
