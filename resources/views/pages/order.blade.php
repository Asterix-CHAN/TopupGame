@extends('layouts.game.order')

@section('title', 'order')

@section('jumbotron')
    <section class="w-full ">
        <div class="w-full h-[200px] md:h-[400px] flex flex-nowrap justify-center pt-[68px] relative mx-auto">
            @if ($item->gallery->isNotEmpty() && $item->gallery->first()->image)
                <img src="{{ Storage::url($item->gallery->first()->image) }}" alt=""
                    class="object-fill object-center absolute h-[250px] md:h-[400px] w-screen mt-0 shadow-2xl backdrop-blur-2xl drop-shadow-2xl" />
            @else
                <img src="{{ Storage::url($item->image) }}" alt=""
                    class="object-fill object-center absolute h-[250px] md:h-[400px] w-screen mt-0 shadow-2xl backdrop-blur-2xl drop-shadow-2xl" />
            @endif
        </div>
        <div class=" xl:container px-4 md:px-6 h-[200px] flex top-10 md:top-0 relative mx-auto  ">
            <!-- IMG LOGO -->
            <div class="flex flex-row  gap-x-5 justify-center text-start items-center relative ">
                <div
                    class="w-[130px] h-[130px] md:w-[170px] md:h-[170px] aspect-square rounded-xl bg-black flex ring-8  ring-slate-400">
                    <img src="{{ Storage::url($item->image) }}" alt=""
                        class="object-cover items-center w-full rounded-xl object-center p-1 cursor-pointer">
                </div>

                <div class="relative text-white mt-9 drop-shadow-2xl box-shadow-lg shadow-black">
                    <h3 class=" font-semibold text-xl md:text-3xl ">{{ $item->name }}</h3>
                    <p class="text-sm md:text-xl">{{ $item->developer }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="w-full mt-14 md:mt-10 ">
        <div
            class="xl:container px-4 md:px-5 flex flex-col md:flex-row justify-center w-full relative xl:mx-auto gap-4 md:gap-y-8 ">
            <!-- left Side -->
            <div class="w-full md:w-3/4 h-auto order-10 md:order-none flex flex-col gap-y-4">
                <!-- Informasi Pesanan -->
                <div class="w-full px-4 py-6 bg-slate-500 rounded-lg shadow-md shadow-slate-700 ">
                    <h2 class="font-semibold text-xl md:text-2xl border-b"><i class="fa-solid fa-gamepad mr-2"></i>Informasi
                        Pesanan</h2>
                    <!-- Penjelasan Top Up -->
                    <ul class="mt-5 ml-3 list-decimal text-sm md:text-lg font-medium">
                        <h3 class="text-xl md:text-xl font-semibold text-white">Cara Top Up</h3>
                        <li>
                            <p><span class="text-white mx-1">Pilih </span>nominal
                                diamond</p>
                        </li>
                        <li>
                            <p><span class="text-white mx-1">Masukan Id </span>& Server
                            </p>
                        </li>
                        <li>
                            <p><span class="text-white mx-1">Pilih </span>metode
                                pembayaran</p>
                        </li>
                        <li>
                            <p><span class="text-white mx-1">Isi nomor WhatsApp
                                </span>dengan benar</p>
                        </li>
                        <li>
                            <p><span class="text-white mx-1">Diamond</span>akan otomatis
                                masuk ke akunmu</p>
                        </li>
                    </ul>
                    <!-- Penjelasan Top Up -->
                </div>
                <!-- Informasi Pesanan -->
                <!-- Pilih Diamond -->
                <div class="w-full h-full rounded-lg bg-slate-500 p-2 shadow-md shadow-slate-700 pb-7">
                    <div class="w-full ">
                        <h2 class="text-lg md:text-2xl font-semibold border-b mt-4">Pilih Jumlah Diamond Yang Ingin Anda
                            Beli</h2>
                    </div>
                    <!-- H2 -->
                    <div class="w-auto mt-4 mb-2 md:mb-4 md:mt-7 ml-0 ">
                        <h3 class=" text-white text-lg md:text-xl font-semibold">Event</h3>
                    </div>
                    <!-- H2 -->
                    <!-- Card Promo Diamond -->
                    <div class="grid text-center grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 justify-center ">
                        <!-- Start Card 1 -->
                        <button data-price="120000" data-topup="5" id="btn-buy-1"
                            class=" price-button w-auto flex-auto md:flex-initial px-2 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[50px] z-20 rounded-xl cursor-pointer hover:bg-white gap-2 py-1 overflow-x-hidden">
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 z-10"></div>
                            <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                                class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                            <div
                                class=" flex w-full flex-col text-white text-start justify-start pl-2 flex-1 z-20 relative">
                                <h4 class=" text-xs xl:text-md font-medium  md:text-base text-ellipsis overflow-hidden">
                                    5 Diamond</h4>
                                <p class="text-xs xl:text-md text-ellipsis overflow-hidden">Rp 1000</p>
                                <p
                                    class="text-xs md:text-sm text-ellipsis overflow-hidden line-through text-white italic mt-2 bg-red-600 w-20 animate-pulse skew-y-3">
                                    Rp 2000</p>
                            </div>
                        </button>
                        <!-- End Card 1 -->
                    </div>
                    <!-- End: Card Promo Diamond -->
                    <!-- H2 -->
                    <div class="w-auto mt-4 mb-2 md:mb-4 md:mt-7 ml-0 ">
                        <h2 class=" text-white text-lg md:text-xl font-semibold">Weekly Pass</h2>
                    </div>
                    <!-- H2 -->
                    <!-- Card Weekly Pass -->
                    <div class="grid text-center grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-2 justify-center">
                        <!-- Start Card 1 -->
                        <button data-price="Rp 27.000" data-topup="x1 Weekly Diamond Pass (Misi Top Up + 100)"
                            id="btn-buy-2"
                            class="price-button w-auto flex-auto md:flex-initial pl-2 pr-0 md:pr-1 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[50px]  z-20 rounded-xl cursor-pointer hover:bg-white hover:text-slate-700 overflow-x-hidden gap-1">
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70  z-10"></div>
                            <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                                class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                            <div
                                class="overflow-x-hidden flex w-full flex-col text-white  text-start justify-start flex-1 z-20 relative my-2">
                                <h5 class=" text-xs font-normal md:text-sm ">
                                    x1 Weekly Diamond Pass (Misi Top Up + 100)</h5>
                                <p class="text-xs md:text-sm text-ellipsis ">Rp 27.000</p>
                            </div>
                        </button>
                        <!-- End Card 1 -->
                        <!-- Start Card 1 -->
                        <div
                            class="w-auto flex-auto md:flex-initial px-4 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[70px] z-20 rounded-xl cursor-pointer hover:bg-white hover:text-slate-700">
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 e z-10"></div>
                            <img src="../images/logo/diamond.png" alt="Game Logo"
                                class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                            <div
                                class=" flex w-full flex-col text-white  text-start justify-start pl-2 flex-1 z-20 relative my-2">
                                <h5 class=" text-xs font-semibold  md:text-base text-ellipsis overflow-hidden">
                                    x1 Weekly Diamond Pass (Misi Top Up + 100)</h5>
                                <p class="text-xs md:text-sm text-ellipsis overflow-hidden">Rp 27.000</p>
                            </div>
                        </div>
                        <!-- End Card 1 -->
                        <!-- Start Card 1 -->
                        <div
                            class="w-auto flex-auto md:flex-initial px-4 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[70px] z-20 rounded-xl cursor-pointer hover:bg-white hover:text-slate-700">
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 e z-10"></div>
                            <img src="../images/logo/diamond.png" alt="Game Logo"
                                class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                            <div
                                class=" flex w-full flex-col text-white  text-start justify-start pl-2 flex-1 z-20 relative my-2">
                                <h5 class=" text-xs font-semibold  md:text-base text-ellipsis overflow-hidden">
                                    x1 Weekly Diamond Pass (Misi Top Up + 100)</h5>
                                <p class="text-xs md:text-sm text-ellipsis overflow-hidden">Rp 27.000</p>
                            </div>
                        </div>
                        <!-- End Card 1 -->
                    </div>
                    <!-- End Card Wekkly Pass -->
                    <!-- H2 -->
                    <div class="w-auto mt-4 mb-2 md:mb-4 md:mt-7 ml-0  ">
                        <h3 class=" text-white text-lg md:text-xl font-semibold ">Diamond</h3>
                    </div>
                    <!-- H2 -->
                    <!-- Card Diamond -->
                    <div class="grid text-center grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 justify-center ">
                        <!-- Start Card 1 -->
                        <div
                            class="w-auto flex-auto md:flex-initial px-4 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[70px] z-20 rounded-xl cursor-pointer hover:bg-white ">
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 z-10"></div>
                            <img src="../images/logo/diamond.png" alt="Game Logo"
                                class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                            <div
                                class=" flex w-full flex-col text-white text-start justify-start pl-2 flex-1 z-20 relative">
                                <h4 class=" text-sm font-semibold  md:text-base text-ellipsis overflow-hidden">
                                    5 Diamond</h4>
                                <p class="text-xs md:text-sm text-ellipsis overflow-hidden">Rp 1000</p>
                            </div>
                        </div>
                        <!-- End Card 1 -->
                    </div>
                    <!-- End: Card Diamond -->
                </div>
                <!-- Pilih Diamond -->
            </div>
            <!-- End Left Side -->

            <!-- Right Side -->
            <div class="w-full md:w-1/4 md:h-screen flex flex-col gap-y-2 order-last md:order-none ">

                <!-- START: Shipping Details-->
                <div id="offcanvas"
                    class="w-full px-4 py-6 rounded-lg rounded-b-none md:rounded-lg md:relative md:z-10 bg-slate-500 shadow-md shadow-slate-700 flex h-auto fixed bottom-0 left-0 right-0 translate-y-full transition-transform duration-300 ease-in-out  md:translate-y-0 md:flex md:flex-col z-40">
                    <div id="shipping-detail" class=" px-4 relative flex flex-col w-full">
                        
                        <button id="close-offcanvas" class="md:hidden text-right text-white">
                            <i class="fa-solid fa-xmark text-2xl"></i>
                        </button>
                        <form action="{{ route('checkout') }}" >
                        <div" class="flex flex-col justify-center items-center md:items-stretch">
                            {{-- Total Diamon --}}
                            <div class="flex flex-col mb-4 w-full">
                                <p id="topup" class="text-white font-semibold">Informasi Pesanan</p>
                                <input data-input id="topup-value" type="hidden" value="" />

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
                                    <button disabled type="submit"
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
            </div>
            <!-- END: Shipping Details-->
        </div>
        <!-- End Right Side -->
        </div>
    </section>


    {{-- Mobile --}}
    <section>
        <div id="buy-mobile"
            class="fixed  bottom-0 h-[100px] invisible md:hidden  w-full bg-slate-600  items-center grid grid-cols-6  gap-2 px-2 z-20 md:z-0">
            <div class="rounded-md col-span-4  p-4 mt-2 w-full block  mx-4">
                <ul class="flex flex-col text-white text-sm">
                    <li id="price-list2"><i class="fa-solid fa-triangle-exclamation mr-1"></i>Belum
                        ada item produk dipilih</li>
                    <li id="topup2"></li>
                </ul>
            </div>
            <button type="button" id="open-offcanvas"
                class=" bg-slate-800 text-white focus:bg-sky-500 focus:outline-none w-auto md:w-full py-2  md:rounded-2xl col-span-2 rounded-lg text-base md:text-lg focus:text-sky-700 transition-all duration-200 px-6 mx-auto items-center"><i
                    class="fa-solid fa-cart-shopping mr-2"></i>Beli</button>
        </div>
    </section>
@endsection

@push('top-addon-script')
    {{-- Input --}}
   @vite('resources/js/shippingDetail.js')

    {{-- button topup --}}
    <script>
        $(function() {
            // Saat tombol harga diklik
            $(".price-button").on("click", function() {

                var newTopupValue = $(this).data("topup"); // Example of dynamically changing the value

                $(this).data("topup", newTopupValue);

                // Ambil harga dari atribut data-price
                var price = $(this).data("price");
                var topup = $(this).data("topup");
                console.log($(this).data("topup"));
                // Ganti teks pada paragraf dengan harga yang baru
                $("#price-list").text(price.toLocaleString('id-ID'));
                $("#price-list2").text(price.toLocaleString('id-ID'));
                $("#topup").text(topup.toLocaleString('id-ID') + " Diamond");
                $("#topup2").text(topup.toLocaleString('id-ID') + " Diamond");

                // // value
                $("#topup-value").val(newTopupValue);
            });
        });
    </script>

    {{-- offcanvas --}}
    @vite('resources/js/buttonOrder.js')
   
@endpush
