@extends('layouts.game.gamelistpage')
@section('title', 'games')


@section('content')
    
    <!-- Start Section Hero -->
    <section class="w-full items-center pt-24">
        <div class="flex md:gap-4 mx-auto relative">
            <!-- Left Side -->
            <div id="filterNav"
                class="w-full h-screen inset-0 z-50 md:z-30 md:w-1/5 fixed bg-white shadow-2xl md:rounded-3xl md:ml-8 -left-full md:block md:sticky md:top-24 ... transition-all duration-300 ease-in-out">
                <div id="filter-container" class="flex md:flex-none flex-col relative h-full">
                    <!-- Btn Close -->
                    <div class="top-8 ml-10 relative visible md:invisible cursor-pointer transition-all">
                        <button id="close-btn-filter" type="button" class="text-3xl ">
                            <i class="fa-solid fa-chevron-left"></i> Filter
                        </button>

                    </div>
                    <!-- btn Close -->
                    <!-- List Kategori -->
                    <form id="filterForm">
                        <div class="ml-3 flex flex-col">
                            <div class="font-medium mt-20 md:mt-5 ml-7">
                                <!-- Genre game -->
                                <h2 class="font-semibold mb-4 text-2xl">Kategori</h2>
                                <ul class="gap-4 text-xl">
                                    <!-- List Kategori -->
                                    <li class="mb-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="category"
                                                class="form-checkbox bg-transparent rounded-sm mr-2">
                                            <span class="text-sm">Action</span>
                                        </label>
                                    </li>
                                    <li class="mb-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="category"
                                                class="form-checkbox bg-transparent rounded-sm mr-2">
                                            <span class="text-sm">Adventure</span>
                                        </label>
                                    </li>
                                    <li class="mb-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="category"
                                                class="form-checkbox bg-transparent rounded-sm mr-2">
                                            <span class="text-sm">MMO</span>
                                        </label>
                                    </li>
                                    <li class="mb-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="category"
                                                class="form-checkbox bg-transparent rounded-sm mr-2">
                                            <span class="text-sm">Simulasi</span>
                                        </label>
                                    </li>
                                    <li class="mb-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="category"
                                                class="form-checkbox bg-transparent rounded-sm mr-2">
                                            <span class="text-sm">Strategy</span>
                                        </label>
                                    </li>

                                    <!-- List Kategori -->
                                </ul>

                                <!-- Platform -->
                                <h2 class="font-semibold mt-8 mb-4 text-2xl">Platform</h2>
                                <ul class="gap-4 text-xl">
                                    <!-- List Platform -->
                                    <li class="mb-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="platform"
                                                class="form-checkbox  bg-transparent rounded-sm  mr-2">
                                            <span class="text-sm">PC</span>
                                        </label>
                                    </li>
                                    <li class="mb-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="platform"
                                                class="form-checkbox bg-transparent rounded-sm mr-2">
                                            <span class="text-sm">Playstation</span>
                                        </label>
                                    </li>
                                    <li class="mb-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="platform"
                                                class="form-checkbox bg-transparent rounded-sm mr-2">
                                            <span class="text-sm">Mobile</span>
                                        </label>
                                    </li>
                                    <!-- List Platform -->
                                </ul>
                            </div>
                            <!-- button -->
                            <button type="button"
                                class="bg-yellow-600 hover:bg-orange-800 text-white px-7 md:px-8 py-1 rounded-full mx-auto mt-8 text-sm md:text-lg">Apply
                                Filter</button>
                        </div>
                    </form>
                    <!-- List Kategori -->
                    <div class="flex items-center justify-between">
                        <div class="flex space-x-6 justify-center mx-auto mb-3 mt-20">
                            <a href="#" class="text-gray-500 hover:text-gray-900"> <i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="#" class="text-gray-500 hover:text-gray-900"> <i
                                    class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900"> <i
                                    class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900"><i
                                    class="fa-solid fa-phone"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Left -->

            <!-- Right Side -->
            <div class="h-auto w-full z-30 md:w-4/5 md:mr-3 mx-2 items-center ">
                <!-- Carousel -->
                <div class="w-full h-[200px] md:h-[400px] flex relative ">
                    <div class="swiper mySwiper w-full h-full rounded-3xl ml-9 ">
                        <div class="swiper-wrapper ">
                            <!-- Card Carousel 1 -->
                            <div class="swiper-slide">
                                <div
                                    class="card flex-row bg-clip-border bg-transparent text-white shadow-md relative w-full h-full items-end overflow-hidden rounded-3xl">
                                    <img src="{{ url('Game/src/images/content/car-1.png') }}" alt="bg"
                                        class="absolute inset-0 h-full w-full object-cover object-center" />
                                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 ..."></div>
                                    <div class="relative flex flex-col pl-5 my-7 md:my-14">
                                        <h4
                                            class="block antialiased tracking-normal font-sans text-lg font-semibold leading-snug  md:text-2xl">
                                            Nongki Top Up</h4>
                                        <p class="block antialiased text-lg font-medium md:text-xl">Dapatkan 10% Promo
                                            <br />with
                                            code: Glory10</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Carousel 2 -->
                            <div class="swiper-slide">
                                <div
                                    class="card flex-row bg-clip-border bg-transparent text-white shadow-md relative w-full h-full items-end overflow-hidden rounded-3xl">
                                    <img src="{{ url('Game/src/images/content/car-3.png') }}" alt="bg"
                                        class="absolute inset-0 h-full w-full object-cover object-center" />
                                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 ..."></div>
                                    <div class="relative flex flex-col justify-end pl-5 my-7 md:my-14">
                                        <h4
                                            class="block antialiased tracking-normal text-lg font-semibold leading-snug md:text-2xl">
                                            Ultimate $50K Winter Clash</h4>
                                        <p class="text-lg font-medium md:text-xl">Join yhe frosty fray and <br
                                                class="" />
                                            come out on top</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Swiper pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- End Carousel -->

                <!-- Start Btn Filter -->
                <div class="w-auto block md:hidden py-2 mt-10">
                    <button id="filter-btn" type="button"
                        class="items-center flex justify-center rounded-md md:text-2xl text-lg px-6 bg-white hover:bg-sky-500 font-semibold">
                        Filter
                    </button>
                </div>
                <!-- End Btn Filter -->

                <!-- H2 -->
                <div class=" flex justify-start py-4 pt-12">
                    <h2 class="h2 text-lg md:text-3xl font-semibold"><i class="fa-solid fa-fire mr-3"></i>Rilis Terbaru
                    </h2>
                </div>
                <!-- H2 -->

                <!-- Game Menu -->
                <div
                    class="grid text-center grid-cols-3 md:grid-cols-4 xl:grid-cols-5 md:mr-2 gap-4 md:gap-8 justify-center pt-5 ">

                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150] z-20 backdrop-blur-xl backdrop-brightness-75 backdrop-contrast-100 shadow-md">
                        <a href="{{ route('order') }}" tabindex="0">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square min-w-50 min-h-50 rounded-lg object-cover object-center ring-1 md:rounded-x hover:scale-110 transition-all duration-300" />
                            <div
                                class="relative flex w-full flex-col text-white text-start justify-start pl-0 md:pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="ttext-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150]  z-20 backdrop-blur-xl backdrop-brightness-105">
                        <a href="{order.html}" tabindex="0">
                            <div class="min-w-50 min-h-50 ">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square h-full w-full rounded-lg object-cover object-center ring-1 md:rounded-xl" />
                            </div>
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div
                                class="relative flex w-full flex-col text-white text-start justify-start pl-0 md:pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="ttext-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150]  z-20 backdrop-blur-xl backdrop-brightness-105">
                        <a href="{order.html}" tabindex="0">
                            <div class="min-w-50 min-h-50 ">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square h-full w-full rounded-lg object-cover object-center ring-1 md:rounded-xl" />
                            </div>
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div
                                class="relative flex w-full flex-col text-white text-start justify-start pl-0 md:pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="ttext-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150]  z-20 backdrop-blur-xl backdrop-brightness-105">
                        <a href="{order.html}" tabindex="0">
                            <div class="min-w-50 min-h-50 ">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square h-full w-full rounded-lg object-cover object-center ring-1 md:rounded-xl" />
                            </div>
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div
                                class="relative flex w-full flex-col text-white text-start justify-start pl-0 md:pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="ttext-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150]  z-20 backdrop-blur-xl backdrop-brightness-105">
                        <a href="{order.html}" tabindex="0">
                            <div class="min-w-50 min-h-50 ">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square h-full w-full rounded-lg object-cover object-center ring-1 md:rounded-xl" />
                            </div>
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div
                                class="relative flex w-full flex-col text-white text-start justify-start pl-0 md:pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="ttext-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                  
                </div>
                <!-- Game Menu -->

                <!-- H2 -->
                <div class=" flex justify-start py-4 pt-12">
                    <h2 class="h2 text-lg md:text-3xl font-semibold"><i class="fa-solid fa-fire mr-3"></i>Rilis Terbaru
                    </h2>
                </div>
                <!-- H2 -->

                <!-- Game Menu -->
                <div
                    class="grid text-center grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 md:mr-2 gap-8 justify-center pt-5 ">

                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150]  z-20 backdrop-blur-xl backdrop-brightness-105">
                        <a href="{order.html}" tabindex="0">
                            <div class="w-full min-h-100 ">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square h-full w-full rounded-lg object-cover object-center ring-1 md:rounded-xl" />
                            </div>
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div class="relative flex w-full flex-col text-white text-start justify-start pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="text-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150]  z-20 backdrop-blur-xl backdrop-brightness-105">
                        <a href="{order.html}" tabindex="0">
                            <div class="w-full min-h-100 ">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square h-full w-full rounded-lg object-cover object-center ring-1 md:rounded-xl" />
                            </div>
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div class="relative flex w-full flex-col text-white text-start justify-start pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="text-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150]  z-20 backdrop-blur-xl backdrop-brightness-105">
                        <a href="{order.html}" tabindex="0">
                            <div class="w-full min-h-100 ">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square h-full w-full rounded-lg object-cover object-center ring-1 md:rounded-xl" />
                            </div>
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div class="relative flex w-full flex-col text-white text-start justify-start pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="text-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150]  z-20 backdrop-blur-xl backdrop-brightness-105">
                        <a href="{order.html}" tabindex="0">
                            <div class="w-full min-h-100 ">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square h-full w-full rounded-lg object-cover object-center ring-1 md:rounded-xl" />
                            </div>
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div class="relative flex w-full flex-col text-white text-start justify-start pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="text-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                    <!-- Start Card 1 -->
                    <div
                        class="min-w-[30px] max-w-[250px] p-3 flex-col items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:rounded-2x h-[150]  z-20 backdrop-blur-xl backdrop-brightness-105">
                        <a href="{order.html}" tabindex="0">
                            <div class="w-full min-h-100 ">
                                <img src="{{ url('Game/src/images/logo/valorant.jpeg') }}" alt="Game Logo"
                                    class="relative aspect-square h-full w-full rounded-lg object-cover object-center ring-1 md:rounded-xl" />
                            </div>
                            <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div class="relative flex w-full flex-col text-white text-start justify-start pl-2 mt-6">
                                <h4 class="truncate text-xxs font-semibold ">
                                    Valorant</h4>
                                <p class="text-xxs md:text-sm">Riot Games</p>
                            </div>
                        </a>
                    </div>
                    <!-- End Card 1 -->
                </div>
                <!-- Game Menu -->
            </div>
        </div>
    </section>
    <!-- End Section Hero -->
@endsection