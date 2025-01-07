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
      <livewire:Order />
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
    <script>
        $(function() {
            $(".price-button").on("click", function() {
                var price = $(this).data("price");
                var topup = $(this).data("topup");
                
                $("#topup-value").val(topup).trigger("input");
                $("#topup-price").val(price).trigger("input");

                $("#price-list, #price-list2").text('Rp. ' + price.toLocaleString('id-ID'));
                $("#topup, #topup2").text(topup.toLocaleString('id-ID') + " Genesys Crystal");
            });
        });
    </script> 

    {{-- offcanvas --}}
    @vite('resources/js/buttonOrder.js')
@endpush
