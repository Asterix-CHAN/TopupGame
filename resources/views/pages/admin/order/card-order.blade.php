<div id="offcanvas"
    class="w-full px-4 py-6 rounded-lg rounded-b-none md:rounded-lg md:relative md:z-10 bg-slate-500 shadow-md shadow-slate-700 flex h-auto fixed bottom-0 left-0 right-0 translate-y-full transition-transform duration-300 ease-in-out  md:translate-y-0 md:flex md:flex-col z-40">
    <div class=" px-4 relative flex flex-col w-full">

        <button id="close-offcanvas" class="md:hidden text-right text-white">
            <i class="fa-solid fa-xmark text-2xl"></i>
        </button>
        <form action="{{ route('checkout') }}" id="shipping-detail">
            @csrf
            <div" class="flex flex-col justify-center items-center md:items-stretch">
                {{-- Total Diamon --}}
                <div class="flex flex-col mb-4 w-full">
                    <p id="topup" class="text-white font-semibold">Informasi Pesanan</p>
                    <input data-input id="topup-value" type="hidden" value="" name="" required />

                </div>
                {{-- Total Diamond --}}
                <!-- START: Input Id User-->
                <div class="flex flex-col mb-4 w-full">
                    <label for="id-user" class="text-sm md:text-lg font-semibold mb-2">
                        ID
                    </label>
                    <input data-input type="text" id="id-user"
                        class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-small focus:border-blue-200 focus:outline-none"
                        placeholder="Masukkan User ID..." />
                </div>
                <!-- END: Input Id User -->
                <!-- START: Input Server User-->
                <div class="flex flex-col mb-4 w-full">
                    <label for="server-user" class="text-sm md:text-lg font-semibold mb-2">
                        Server
                    </label>
                    <input data-input type="text" id="server-user"
                        class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-small focus:border-blue-200 focus:outline-none"
                        placeholder="Masukkan User Server..." />
                </div>
                <!-- END:  Input Server User -->
                <!-- START: Phone Number-->
                <div class="flex flex-col mb-4 w-full">
                    <label for="phone-number" class="text-sm md:text-lg font-semibold  mb-2">
                        Nomor WhatsApp
                    </label>
                    <input data-input type="tel" id="phone-number"
                        class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-small focus:border-blue-200 focus:outline-none"
                        placeholder="Masukkan Nomor WhatsApp" />
                </div>
                <!-- END:Phone Number  -->

                <!-- START: Choose Payment-->
                <div class="mb-4 w-full h-auto  ">
                    <label class="text-sm md:text-lg font-semibold mb-2 gap-y-2 text-white">
                        Total
                    </label>
                    <div>
                        <p id="price-list" class="right-0 text-base md:text-lg text-white"></p>
                        <input data-input id="topup-price" type="hidden" value="" name="" required />
                    </div>
                    <!-- Item Wrapper -->
                    {{-- <div class=" max-w-xl mx-auto">
                <ul class="shadow-box text-white ">
                    <!-- List E-Wallet -->
                    <li class="relative border-b border-gray-200" x-data="{ selected: null }">
                        <!-- Button -->
                        <button type="button" class="w-full py-3 text-left "
                            @click="selected !== 1 ? selected = 1 : selected = null">
                            <div id="order-info"
                                class="flex items-center justify-between font-semibold text-sm md:text-base ">
                                <h4><i class="fa-solid fa-wallet mr-2"></i> E-Wallet </h4>
                               
                                <p id="price-list" class="right-0 text-sm"></p>
                                
                            </div>
                        </button>
                        <!-- End Button -->
                        <div class=" relative overflow-hidden transition-all max-h-0 duration-700 flex flex-col items-center "
                            x-ref="container1"
                            x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' :
                                ''">

                            <!-- Start Card 1 -->
                            <button type="button" data-value="dana" data-name="payment"
                                class="w-5/6 items-center px-4 focus:border-black relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:gap-x-3 md:rounded-2x md:p-3 border-2 h-[80px] cursor-pointer my-1">
                                <div class="w-32 h-[50px] relative rounded-xl">
                                    <img src="{{ url('Game/src') }}/images/logo/logoDana.png"
                                        alt="Game Logo"
                                        class="aspect-square h-full w-full rounded-lg !object-contain !object-center md:rounded-xl left-0 bg-white p-1">
                                </div>
                                <div
                                    class="relative flex w-full flex-col text-white justify-start text-start pl-2">
                                    <h4
                                        class=" truncate text-xxs font-semibold  md:text-base text-right">
                                        Dana</h4>
                                    <p class="text-xxs md:text-sm">Dicek Otomatis</p>
                                    <hr class=" border border-slate-100 " />
                                    <p  class="text-xs md:text-sm mt-1"></p>
                                </div>
                            </button>

                            <!-- Start Card 1 -->
                            <button type="button" data-value="shoopepay" data-name="payment"
                                class="w-5/6 focus:border-2 focus:border-white focus:outline-none px-4 items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-offset-2 hover:ring-offset-white md:gap-x-3 md:rounded-2x md:p-3 border-2 h-[80px] cursor-pointer my-1">
                                <div class="w-32 h-[50px] relative rounded-xl">
                                    <img src="{{ url('Game/src') }}/images/logo/Shopepay logo.png"
                                        alt="Game Logo"
                                        class=" aspect-square h-full w-full rounded-lg !object-contain !object-center md:rounded-xl left-0 bg-white p-1">
                                </div>
                                <div
                                    class="relative flex w-full flex-col text-white justify-start text-start pl-2">
                                    <h4
                                        class=" truncate text-xxs font-semibold  md:text-base text-right">
                                        Shopee Pay</h4>
                                    <p class="text-xxs md:text-sm">Dicek Otomatis</p>
                                    <hr class=" border border-slate-100 " />
                                    <p class="text-xs md:text-sm mt-1">Rp. 1000</p>
                                </div>
                            </button>
                            <!-- End Card 1 -->
                        </div>
                        <div class="w-full  text-right cursor-pointer"
                            @click="selected !== 1 ? selected = 1 : selected = null">
                            <i
                                x-bind:class="selected ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'"></i>
                        </div>
                    </li>
                    <!-- End E-wallet -->
                </ul>
            </div> --}}
                    <!-- End Item Wrapper -->
                </div>
                <!-- END:Choose Payment  -->

                <!-- Tombol -->
                @auth
                    <div class="w-full">
                        <button disabled type="submit" id="button-beli"
                            class=" bg-slate-800  text-white focus:bg-sky-500 focus:outline-none w-full py-2  md:rounded-2xl rounded-lg text-base md:text-lg focus:text-sky-700 transition-all duration-200 px-6 mx-auto items-center col-end-7 col-span-2 md:col-start-1 md:col-end-7"><i
                                class="fa-solid fa-cart-shopping mr-2"></i>Beli</button>
                    </div>

                @endauth
        </form>
        @guest
            <a href="{{ route('login') }}"
                class=" bg-cyan-900 hover:bg-cyan-600 text-white focus:bg-sky-800 focus:outline-none md:w-full py-2  md:rounded-2xl rounded-lg text-xs md:text-base text-center focus:text-white transition-all duration-200 px-6 mx-auto items-center col-end-7 col-span-2 md:col-start-1 md:col-end-7">Login
                Atau Register Untuk Transaksi</a>
        @endguest

        <!-- Tombol -->
    </div>
</div>
