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

    @csrf
    <div class="grid text-center grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 justify-center ">
        <!-- Start Card 1 --> <!-- id btn-buy-1 untuk buttonOrder.js animasi screen handphone -->
        {{-- untuk jquery pake class price-button --}}
        @forelse ($events as $event)
            <input type="radio" class="peer hidden" id="event{{ $event->id }}" name="select"
                wire:model="select" value="{{ $event->price }}|{{ $event->diamond_event }}" />

            <label for="event{{ $event->id }}" data-price="{{ $event->price }}" data-topup="{{ $event->diamond_event }}"
                class="price-button w-auto flex-auto md:flex-initial pl-1 md:px-2 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[70px] z-20 rounded-xl cursor-pointer hover:bg-white peer-checked:ring-2 peer-checked:ring-teal-500 peer-checked:ring-offset-2 peer-checked:ring-offset-teal-500 peer-checked:scale-105 overflow-hidden">
                <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 z-10"></div>
                <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                    class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                <div
                    class=" flex w-full flex-col text-white text-start justify-start pl-2 flex-1 z-20 relative">
                    <h4 class="text-sm font-semibold md:text-base text-ellipsis overflow-hidden">
                        {{ $event->diamond_event }} Diamond</h4>
                    <p class="text-xs xl:text-md text-ellipsis overflow-hidden">Rp.
                        {{ number_format($event->price, 0, ',', '.') }}</p>

                    <p
                        class="text-xs md:text-sm text-ellipsis overflow-hidden line-through text-white italic mt-2 bg-red-600 w-20 animate-pulse skew-y-3">
                        Rp. {{ number_format($event->diamond->price, 0, ',', '.') }}</p>
                </div>
            </label>
        @empty
            <div
                class=" price-button w-auto flex-auto md:flex-initial px-2 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[50px] z-20 rounded-xl cursor-pointer hover:bg-white gap-2 py-1 overflow-x-hidden">
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
        <div data-price="Rp 27.000" data-topup="x1 Weekly Diamond Pass (Misi Top Up + 100)" id="btn-buy-2"
            class="price-button w-auto flex-auto md:flex-initial pl-2 pr-0 md:pr-1 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[50px]  z-20 rounded-xl cursor-pointer hover:bg-white hover:text-slate-700 overflow-x-hidden gap-1">
            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70  z-10"></div>
            <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
            <div
                class="overflow-x-hidden flex w-full flex-col text-white  text-start justify-start flex-1 z-20 relative my-2">
                <h5 class=" text-xs font-normal md:text-sm ">
                    x1 Weekly Diamond Pass (Misi Top Up + 100)</h5>
                <p class="text-xs md:text-sm text-ellipsis ">Rp 27.000</p>
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
        @forelse ($diamonds as $item)
            <input type="radio" class="peer hidden" id="diamond{{ $item->id }}" name="select"
                wire:model="select" value="{{ $item->price }}|{{ $item->diamond }}" />

            <label for="diamond{{ $item->id }}" data-price="{{ $item->price }}" data-topup="{{ $item->diamond }}"
                class="price-button w-auto flex-auto md:flex-initial px-4 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[70px] z-20 rounded-xl cursor-pointer hover:bg-white peer-checked:ring-2 peer-checked:ring-teal-500 peer-checked:ring-offset-2 peer-checked:ring-offset-teal-500 peer-checked:scale-105 overflow-hidden">
                <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 z-10"></div>
                <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                    class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20" />
                <div
                    class="flex w-full flex-col text-white text-start justify-start pl-2 flex-1 z-20 relative">
                    <h4 class="text-sm font-semibold md:text-base text-ellipsis overflow-hidden">
                        {{ $item->diamond }} Diamond
                    </h4>
                    <p class="text-xs md:text-sm text-ellipsis overflow-hidden">Rp
                        {{ number_format($item->price, 0, ',', '.') }}
                    </p>
                </div>
            </label>
        @empty
            @foreach ($diamonds as $diamond)
                <button data-price="{{ $diamond->price }}" data-topup="{{ $diamond->diamond }}"
                    id="btn-buy-3"
                    class="price-button w-auto flex-auto md:flex-initial px-4 md:px-4 items-center relative flex duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-sky-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x border-2 min-h-[70px] z-20 rounded-xl cursor-pointer hover:bg-white ">
                    <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 z-10"></div>
                    <img src="{{ url('Game/src') }}/images/logo/diamond.png" alt="Game Logo"
                        class="relative aspect-square h-10 w-10 rounded-lg !object-cover !object-center md:h-14 md:w-14 md:rounded-xl left-0 z-20">
                    <div
                        class=" flex w-full flex-col text-white text-start justify-start pl-2 flex-1 z-20 relative">
                        <h4 class=" text-sm font-semibold  md:text-base text-ellipsis overflow-hidden">
                            {{ $diamond->diamond }} Diamond</h4>
                        <p class="text-xs md:text-sm text-ellipsis overflow-hidden">Rp.
                            {{ number_format($diamond->price, 0, ',', '.') }}</p>
                    </div>
                </button>
            @endforeach
        @endforelse
        <!-- End Card 1 -->
    </div>
    <!-- End: Card Diamond -->
</div>