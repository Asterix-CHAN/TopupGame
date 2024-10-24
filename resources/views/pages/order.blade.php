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
                        <!-- Start Card 1 --> <!-- id btn-buy-1 untuk buttonOrder.js animasi screen handphone -->
                        {{-- untuk jquery pake class price-button --}}
                        @forelse ($events as $event)
                            <button data-price="{{ $event->price }}" data-topup="{{ $event->diamond->diamond }}"
                                id="btn-buy-1"
                                class=" price-button w-auto flex-auto md:flex-initial px-2 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[50px] z-20 rounded-xl cursor-pointer hover:bg-white gap-2 py-1 overflow-x-hidden">
                                <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 z-10"></div>
                                <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                                    class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                                <div
                                    class=" flex w-full flex-col text-white text-start justify-start pl-2 flex-1 z-20 relative">
                                    <h4 class=" text-xs xl:text-md font-medium  md:text-base text-ellipsis overflow-hidden">
                                        {{ $event->diamond->diamond }} Diamond</h4>
                                    <p class="text-xs xl:text-md text-ellipsis overflow-hidden">{{ $event->price }}</p>

                                    <p
                                        class="text-xs md:text-sm text-ellipsis overflow-hidden line-through text-white italic mt-2 bg-red-600 w-20 animate-pulse skew-y-3">
                                        Rp {{ $event->diamond->price }}</p>
                                </div>
                            </button>
                        @empty
                            <div
                                class=" price-button w-auto flex-auto md:flex-initial px-2 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[50px] z-20 rounded-xl cursor-pointer hover:bg-white gap-2 py-1 overflow-x-hidden">
                                <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 z-10"></div>
                                <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                                    class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                                <div
                                    class=" flex w-full flex-col text-white text-start justify-start pl-2 flex-1 z-20 relative">
                                    <h4 class=" text-xs xl:text-md font-medium  md:text-base text-ellipsis overflow-hidden">
                                        Tidak Ada Diamond</h4>
                                </div>
                            </div>
                        @endforelse

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
                        <!-- Start Card 1 --> <!-- id btn-buy-2 untuk buttonOrder.js animasi screen handphone -->
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
                        @forelse ($events as $event)
                            <button data-price="{{ $event->diamond->price }}" data-topup="{{ $event->diamond->diamond }}"
                                id="btn-buy-3"
                                class="price-button w-auto flex-auto md:flex-initial px-4 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[70px] z-20 rounded-xl cursor-pointer hover:bg-white ">
                                <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 z-10"></div>
                                <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                                    class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                                <div
                                    class=" flex w-full flex-col text-white text-start justify-start pl-2 flex-1 z-20 relative">
                                    <h4 class=" text-sm font-semibold  md:text-base text-ellipsis overflow-hidden">
                                        {{ $event->diamond->diamond }} Diamond</h4>
                                    <p class="text-xs md:text-sm text-ellipsis overflow-hidden">Rp
                                        {{ $event->diamond->price }}</p>
                                </div>
                            </button>
                        @empty
                            @foreach ($diamonds as $diamond)
                                <button data-price="{{ $diamond->price }}" data-topup="{{ $diamond->diamond }}"
                                    id="btn-buy-3"
                                    class="price-button w-auto flex-auto md:flex-initial px-4 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[70px] z-20 rounded-xl cursor-pointer hover:bg-white ">
                                    <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 z-10"></div>
                                    <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                                        class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                                    <div
                                        class=" flex w-full flex-col text-white text-start justify-start pl-2 flex-1 z-20 relative">
                                        <h4 class=" text-sm font-semibold  md:text-base text-ellipsis overflow-hidden">
                                            {{ $diamond->diamond }} Diamond</h4>
                                        <p class="text-xs md:text-sm text-ellipsis overflow-hidden">Rp
                                            {{ $diamond->price }}</p>
                                    </div>
                                </button>
                            @endforeach
                        @endforelse
                        <!-- End Card 1 -->
                    </div>
                    <!-- End: Card Diamond -->
                </div>
                <!-- Pilih Diamond -->
            </div>
            <!-- End Left Side -->

            <!-- Right Side -->
            <div class="w-full md:w-1/4 md:h-screen flex flex-col gap-y-2 order-last md:order-none md:sticky md:top-32  ">

                <!-- START: Shipping Details-->
                @include('pages.admin.order.card-order')
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
    {{-- @vite('resources/js/shippingDetail.js') --}}

    {{-- button topup --}}
    {{-- <script>
        $(function() {
            // Saat tombol harga diklik
            $(".price-button").on("click", function() {
                var price = $(this).data("price");
                var topup = $(this).data("topup");

                // Update displayed values
                $("#price-list, #price-list2").text(price.toLocaleString('id-ID'));
                $("#topup, #topup2").text(topup.toLocaleString('id-ID') + " Diamond");

                // Set top-up value in the hidden input
                $("#topup-value").val(topup);
                input.addEventListener("change", function(event) {
                    data[event.target.id] = event.target.value;

                    check();
                });
                // Perform the check for button enabling/disabling

            });

            let data = {};

            const inputs = document.querySelectorAll("#shipping-detail input[data-input]");

            for (let index = 0; index < inputs.length; index++) {
                const input = inputs[index];

                input.addEventListener("change", function(event) {
                    data[event.target.id] = event.target.value;

                    check();
                });
                // console.log(input);
            };

            function check() {
                console.log(data);
                const find = Object.values(data).filter((item) => item === "");

                const button = document.querySelector("#shipping-detail button[type='submit']");

                if (find.length == 0) {
                    button.disabled = false;
                    button.classList.add('pointer', 'bg-blue-500');
                    button.classList.remove('bg-slate-800'); // Add the classes
                } else {
                    button.disabled = true;
                    button.classList.remove('pointer', 'bg-blue-500');
                    button.classList.add('bg-slate-800'); // Remove the classes when disabled
                }
            };
        });
    </script> --}}

    <script>
        $(function() {
            function check() {
                let data = {};
                const inputs = document.querySelectorAll("#shipping-detail input[data-input]");
                for (let index = 0; index < inputs.length; index++) {
                    const input = inputs[index];
                    data[input.id] = input.value;
                }
                console.log(data);

                const findEmpty = Object.values(data).filter((value) => value === "");
                const button = document.querySelector("#button-beli");

                if (findEmpty.length == 0) {
                    button.disabled = false;
                    button.classList.add('pointer', 'bg-blue-500');
                    button.classList.remove('bg-slate-800');
                } else {
                    button.disabled = true;
                    button.classList.remove('pointer', 'bg-blue-500');
                    button.classList.add('bg-slate-800');
                }
            }

            const inputs = document.querySelectorAll("#shipping-detail input[data-input]");
            inputs.forEach(input => {
                input.addEventListener("input", function() {
                    check();
                });
            });

            $(".price-button").on("click", function() {
                var price = $(this).data("price");
                var topup = $(this).data("topup");

                $("#topup-value").val(topup).trigger("input");
                $("#topup-price").val(price).trigger("input");

                $("#price-list, #price-list2").text(price.toLocaleString('id-ID'));
                $("#topup, #topup2").text(topup.toLocaleString('id-ID') + " Diamond");
            });

            check();
        });
    </script>

    {{-- offcanvas --}}
    @vite('resources/js/buttonOrder.js')
@endpush
