@extends('layouts/game/homepage')

@section('title', 'homepage')

@section('content')
@if (Session::has('success'))
<script>
    Swal.fire({
        icon: 'success',
        Title: 'Success!',
        text: '{{ Session::get('success') }}'
    });
</script>
@endif
    <main>
        <!-- Start Hero Section -->
        <section class="hero top-0 bg-gray-300 relative pb-5">
            <div class=" md:container mx-auto h-full pt-24 md:pt-[70px] md:pb-0 overflow-hidden">
                <!-- Start Text & Img -->
                <div class="flex flex-col md:flex-row items-center justify-between h-full z-">
                    <!-- Text -->
                    <div class="hero-text md:w-[48%] text-center md:text-left md:justify-start">
                        <!-- Badge -->
                        <div class="flex items-center py-[10px] px-3 w-max mb-[26px] mx-auto md:mx-0 bg-white rounded-full ">
                            <div class="uppercase text-base font-semibold text-orange-600">Nongki Ngopi Games</div>
                        </div>
                        <!-- Title -->
                        <h1 class="h1 mb-6 ">Top Up Game And Start Together</h1>
                        <!-- desc -->
                        <p class="mb-[42px] md:max-w-xl">A Place Top Up Game
                            fast, safe, reliable, legal</p>

                        <a href="#explore-now"
                            class="btn btn-sm bg-teal-500 gap-x-3 mx-auto md:mx-0 w-72 text-white hover:bg-teal-400 left-0"></i>Explore
                            Now <i class="fa-solid fa-arrow-right"></i></a>

                    </div>
                    <!-- Image -->
                    <div class="hero-img hidden md:flex max-w-[814px] self-end">
                        <img src="{{ url('Game/src') }}/images/content/sectionHero2.png" alt=""
                            class="w-full h-full object-cover object-center drop-shadow-2xl">
                    </div>
                </div>
                <!-- End Text & Img -->
            </div>
            <!-- Carousel -->
            <div
                class="swiper-container grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 pt-10 md:pt-24  md:-mt-36 relative overflow-hidden px-2 md:px-5">
                <div class="swiper-wrapper drop-shadow-xl ">
                    <!-- Card Carousel 1 -->
                    <div class="swiper-slide">
                        <div
                            class="card flex-row bg-clip-border bg-transparent text-white shadow-md relative min-h-36 w-full md:h-[216px] items-end overflow-hidden rounded-xl">
                            <img src="{{ url('Game/src') }}/images/content/car-1.png" alt="bg"
                                class="absolute inset-0 h-full w-full object-cover object-center" />
                            <div class="absolute inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div class="relative flex flex-col pl-5 my-7 md:my-14">
                                <h4
                                    class="block antialiased tracking-normal font-sans text-lg font-semibold leading-snug  md:text-2xl">
                                    Nongki Top Up</h4>
                                <p class="block antialiased text-lg font-medium md:text-xl">Dapatkan 10% Promo <br />with
                                    code: Glory10</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card Carousel 2 -->
                    <div class="swiper-slide">
                        <div
                            class="card flex-row bg-clip-border bg-transparent text-white shadow-md relative min-h-36 w-full md:h-[216px] items-end overflow-hidden rounded-xl">
                            <img src="{{ url('Game/src') }}/images/content/car-3.png" alt="bg"
                                class="absolute inset-0 h-full w-full object-cover object-center" />
                            <div class="absolute inset-0 bg-gradient-to-r from-black/70 ..."></div>
                            <div class="relative flex flex-col justify-end pl-5 my-7 md:my-14">
                                <h4
                                    class="block antialiased tracking-normal text-lg font-semibold leading-snug md:text-2xl">
                                    Ultimate $50K Winter Clash</h4>
                                <p class="text-lg font-medium md:text-xl">Join yhe frosty fray and <br class="" />
                                    come out on top</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card Carousel 3 -->
                    <div class="swiper-slide">
                        <div
                            class="card flex-row bg-clip-border bg-transparent text-white shadow-md relative min-h-36 w-full md:h-[216px] items-end overflow-hidden rounded-xl">
                            <img src="{{ url('Game/src') }}/images/content/car-2.png" alt="bg"
                                class="absolute inset-0 h-full w-full object-cover object-center" />
                            <div class="absolute inset-0 bg-gradient-to-r from-black/70 ...0"></div>
                            <div class="relative flex flex-col justify-end pl-5 my-7 md:my-14">
                                <h4
                                    class="block antialiased tracking-normal font-sans text-lg font-semibold leading-snug  md:text-2xl">
                                    Nongki Top Up</h4>
                                <p class="text-lg font-medium  md:text-xl">Dapatkan 10% Promo <br /> with code: Glory10</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card Carousel 4 -->
                    <div class="swiper-slide">
                        <div
                            class="card flex-row bg-clip-border bg-transparent text-white shadow-md relative min-h-36 w-full md:h-[216px] items-end overflow-hidden rounded-xl">
                            <img src="{{ url('Game/src') }}/images/content/car-1.png" alt="bg"
                                class="absolute inset-0 h-full w-full object-cover object-center" />
                            <div class="absolute inset-0 bg-gradient-to-r from-black/70 ...0"></div>
                            <div class="relative flex flex-col justify-end pl-5 my-7 md:my-14">
                                <h4
                                    class="block antialiased tracking-normal font-sans text-lg font-semibold leading-snug md:text-2xl">
                                    Nongki Top Up</h4>
                                <p class="text-lg font-medium md:text-xl">Dapatkan 10% Promo <br /> with code: Glory10</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card Carousel 5 -->
                    <div class="swiper-slide">
                        <div
                            class="card flex-row bg-clip-border bg-transparent text-white shadow-md relative min-h-36 w-full md:h-[216px] items-end overflow-hidden rounded-xl">
                            <img src="{{ url('Game/src') }}/images/content/car-3.png" alt="bg"
                                class="absolute inset-0 h-full w-full object-cover object-center" />
                            <div class="absolute inset-0 bg-gradient-to-r from-black/70 ...0"></div>
                            <div class="relative flex flex-col justify-end pl-5 my-7 md:my-14">
                                <h4
                                    class="block antialiased tracking-normal font-sans text-lg font-semibold leading-snug md:text-2xl">
                                    Nongki Top Up</h4>
                                <p class="text-lg font-medium md:text-xl">Dapatkan 10% Promo <br /> with code: Glory10</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card Carousel 6 -->
                    <div class="swiper-slide">
                        <div
                            class="card flex-row bg-clip-border bg-transparent text-white shadow-md relative min-h-36 w-full md:h-[216px] items-end overflow-hidden rounded-xl">
                            <img src="{{ url('Game/src') }}/images/content/car-2.png" alt="bg"
                                class="absolute inset-0 h-full w-full object-cover object-center" />
                            <div class="absolute inset-0 bg-gradient-to-r from-black/70 ...0"></div>
                            <div class="relative flex flex-col justify-end pl-5 my-7 md:my-14">
                                <h4
                                    class="block antialiased tracking-normal font-sans text-lg font-semibold leading-snug md:text-2xl">
                                    Nongki Top Up</h4>
                                <p class="text-lg font-medium md:text-xl">Dapatkan 10% Promo <br /> with code: Glory10</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!-- END Hero Section -->

        <!-- Start Clients -->
        <section class="w-full pt-3 ">
            <div class="container mx-auto">
                <div class="flex justify-center items-center px-5 py-4  ">
                    <h2 class="text-lg md:text-xl font-semibold">Supported By</h2>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-x-4">
                    <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4 ">
                        <img src="{{ url('Game') }}/src/images/logo/company-1.png" alt="logo adome"
                            class="mx-auto w-32 h-auto object-cover object-center " />
                    </div>
                    <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4  ">
                        <img src="{{ url('Game') }}/src/images/logo/company-2.png" alt="logo adome"
                            class="mx-auto w-32 h-auto object-cover object-center" />
                    </div>
                    <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4">
                        <img src="{{ url('Game') }}/src/images/logo/company-3.png" alt="logo adome"
                            class="mx-auto w-32 h-auto object-cover object-center" />
                    </div>
                    <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4">
                        <img src="{{ url('Game') }}/src/images/logo/company-4.png" alt="logo adome"
                            class="mx-auto w-32 h-auto object-cover object-center" />
                    </div>
                    <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4">
                        <img src="{{ url('Game') }}/src/images/logo/company-5.png" alt="logo adome"
                            class="mx-auto w-32 h-auto object-cover object-center" />
                    </div>
                </div>
            </div>
        </section>
        <!-- End Clients -->

        <!-- Section Rekomendasi Game -->
        <section class="w-full pt-16 md:pt-20 " id="explore-now">
            <div class="mx-5 xl:container xl:mx-auto">
                <div class="flex justify-start py-4 ">
                    <h2 class="h2 text-xl md:text-3xl font-semibold mb-5 drop-shadow-md"><i
                            class="fa-solid fa-heart mr-3"></i>Rekomendasi</h2>
                </div>
                <!-- Card Games -->
                <div class="grid text-center grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-3 justify-center ">
                    <!-- Start Card 1 -->
                    @foreach ($items as $item)
                        <a href="{{ route('order', $item->slug) }}" tabindex="0">
                            <div
                                class="w-auto flex-auto md:flex-initial px-4 md:px-4 items-center relative flex rounded-xl duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-white md:gap-x-3 md:rounded-2x md:p-3 border-2 min-h-[100px] z-20 overflow-x-hidden">
                                <div class="absolute rounded-xl inset-0 bg-gradient-to-r from-black/70 ..."></div>
                                <img src="{{ Storage::url($item->image) }}" alt="Game Logo"
                                    class="relative aspect-square h-14 w-14 rounded-lg object-cover object-center md:h-20 md:w-20 md:rounded-xl left-0">
                                <div class="relative flex w-full flex-col text-white text-start justify-start pl-2">
                                    <h4 class=" truncate text-xs md:text-lg font-semibold ">
                                        {{ $item->name }}</h4>
                                    <p class="text-sm md:text-sm font-sans">{{ $item->developer }}</p>
                                </div>

                            </div>
                        </a>
                    @endforeach

                    <!-- End Card 1 -->

                </div>
                <!-- Card Games -->
            </div>
        </section>
        <!-- Section Rekomendasi Game -->

        <!-- Section Game Terlaris -->
        <section class="w-full pt-16 md:pt-20">
            <div class="mx-5 xl:container xl:mx-auto">
                <div class="flex justify-start py-4 mb-4">
                    <h2 class="h2 text-lg md:text-3xl font-semibold"><i class="fa-solid fa-fire mr-3"></i>Game Terlaris
                    </h2>
                </div>
                <!-- Card Games -->
                <div
                    class="grid text-center grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 gap-5 justify-between">
                    @foreach ($items as $item)
                        <!-- card 1 -->
                        <a href="{{ route('order', $item->slug) }}" tabindex="0">
                            <div
                                class="relative grid grid-cols-1 bg-clip-border  text-gray-700 shadow-md w-auto min-h-[200px] sm:min-h-[250px] md:h-[320px] items-center content-end border-4 border-white rounded-2xl">
                                <img src="{{ Storage::url($item->image) }}" alt=""
                                    class="absolute inset-0 h-full w-full object-cover object-center transition-all duration-300 ease-in-out hover:scale-105 rounded-xl" />
                                <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-black/70 ... "></div>
                                <div class="p-6 relative">
                                    <div class="-mb-7 md:-mb-5">
                                        <h4
                                            class="block text-md font-semibold bg-teal-500 rounded-xl hover:bg-teal-400 mx-2 py-1 md:py-2 text-white hover:shadow-xl hover:shadow-teal-500/50">
                                            {{ $item->name }}
                                        </h4>
                                        <p class="block text-md text-white my-2 ">{{ $item->developer }}</p>
                                    </div>

                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <!-- Card Games -->
            </div>
        </section>
        <!-- Section Game Terlaris -->

        <!-- Section Berita -->
        <section>
            <div class="container mx-auto">

                <div class="relative flex min-h-screen flex-col justify-center overflow-hidden py-6 sm:py-12">
                    <div class="min-h-28 ">
                        <div class="w-full mx-auto py-4">
                            <h2 class="font-bold text-center text-6xl text-slate-700 font-display">
                                Berita Terkini
                            </h2>
                            <p class="text-center mt-4 font-medium text-slate-500">Web Artikel Berita, Edukasi Akademi,
                                Teknologi, Lifestyle, Kuliner, Otomotif, Sejarah, Tips dan Tutorial - Nongkingopi Nongkrong
                                Kita Ngopi.</p>
                            <div class="swiper-article relative overflow-hidden px-2">
                                <div class="swiper-wrapper mt-20 flex flex-row">
                                    <div class="swiper-slide">
                                        <div class="bg-white w-full rounded-lg overflow-hidden shadow-lg">
                                            <img src="https://loremflickr.com/320/240?random=1"
                                                class="object-cover object-center h-52 w-full" alt="">
                                            <div class="p-6">
                                                <span class="block text-slate-400 font-semibold text-sm">16 Juillet
                                                    2016</span>
                                                <h3 class="mt-3 font-bold text-lg pb-4 border-b border-slate-300">
                                                    <a href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal">
                                                        Finding best places to visit in California</a>
                                                </h3>
                                                <div class="flex mt-4 gap-4 items-center">
                                                    <span class="flex gap-1 items-center text-sm">

                                                        35
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">


                                                        20
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">


                                                        15
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="swiper-slide">
                                        <div class="bg-white w-full rounded-lg overflow-hidden shadow-lg">
                                            <img src="https://loremflickr.com/320/240?random=1"
                                                class="object-cover h-52 w-full" alt="">
                                            <div class="p-6">
                                                <span class="block text-slate-400 font-semibold text-sm">16 Juillet
                                                    2016</span>
                                                <h3 class="mt-3 font-bold text-lg pb-4 border-b border-slate-300">
                                                    <a href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal">
                                                        Finding best places to visit in California</a>
                                                </h3>
                                                <div class="flex mt-4 gap-4 items-center">
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        35
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="text-sky-400 w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                        </svg>

                                                        20
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4 text-lime-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                                        </svg>


                                                        15
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="swiper-slide">
                                        <div class="bg-white w-full shadow rounded-lg overflow-hidden">
                                            <img src="https://loremflickr.com/320/240?random=1"
                                                class="object-cover h-52 w-full" alt="">
                                            <div class="p-6">
                                                <span class="block text-slate-400 font-semibold text-sm">16 Juillet
                                                    2016</span>
                                                <h3 class="mt-3 font-bold text-lg pb-4 border-b border-slate-300">
                                                    <a href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal">
                                                        Finding best places to visit in California</a>
                                                </h3>
                                                <div class="flex mt-4 gap-4 items-center">
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        35
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="text-sky-400 w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                        </svg>

                                                        20
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4 text-lime-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                                        </svg>


                                                        15
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="swiper-slide">
                                        <div class="bg-white w-full shadow rounded-lg overflow-hidden">
                                            <img src="https://loremflickr.com/320/240?random=1"
                                                class="object-cover h-52 w-full" alt="">
                                            <div class="p-6">
                                                <span class="block text-slate-400 font-semibold text-sm">16 Juillet
                                                    2016</span>
                                                <h3 class="mt-3 font-bold text-lg pb-4 border-b border-slate-300">
                                                    <a href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal">
                                                        Finding best places to visit in California</a>
                                                </h3>
                                                <div class="flex mt-4 gap-4 items-center">
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        35
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="text-sky-400 w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                        </svg>

                                                        20
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4 text-lime-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                                        </svg>


                                                        15
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="swiper-slide">
                                        <div class="bg-white w-full shadow rounded-lg overflow-hidden">
                                            <img src="https://loremflickr.com/320/240?random=1"
                                                class="object-cover h-52 w-full" alt="">
                                            <div class="p-6">
                                                <span class="block text-slate-400 font-semibold text-sm">16 Juillet
                                                    2016</span>
                                                <h3 class="mt-3 font-bold text-lg pb-4 border-b border-slate-300">
                                                    <a href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal">
                                                        Finding best places to visit in California</a>
                                                </h3>
                                                <div class="flex mt-4 gap-4 items-center">
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        35
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="text-sky-400 w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                        </svg>

                                                        20
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4 text-lime-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                                        </svg>


                                                        15
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="swiper-slide">
                                        <div class="bg-white w-full shadow rounded-lg overflow-hidden">
                                            <img src="https://loremflickr.com/320/240?random=1"
                                                class="object-cover h-52 w-full" alt="">
                                            <div class="p-6">
                                                <span class="block text-slate-400 font-semibold text-sm">16 Juillet
                                                    2016</span>
                                                <h3 class="mt-3 font-bold text-lg pb-4 border-b border-slate-300">
                                                    <a href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal">
                                                        Finding best places to visit in California</a>
                                                </h3>
                                                <div class="flex mt-4 gap-4 items-center">
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        35
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="text-sky-400 w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                                        </svg>

                                                        20
                                                    </span>
                                                    <span class="flex gap-1 items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4 text-lime-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                                        </svg>
                                                        15
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section Berita -->
    </main>
@endsection
