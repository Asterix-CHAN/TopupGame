<div
    class="bg-black block fixed inset-0 w-screen h-screen bg-opacity-85 md:hidden z-10 ">
</div>

<div id="sidebar"
    class="bg-white fixed  md:relative h-full w-1/2 md:w-full inset-0 md:block shadow-xl px-3 z-20 rounded-r-2xl overflow-x-hidden decoration-none box-shadow ">

    <div class="space-y-6 md:space-y-10 mt-10 container">
        <div class="flex items-end justify-end">
            <button
                class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30 grid md:hidden"
                type="button" @click="open = !open">
                <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        stroke-width="3" class="h-6 w-6 text-blue-gray-500">
                        <path fill-rule="evenodd"
                            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
            </button>
        </div>
        <!-- Sidebar header -->
        <h1 class="font-bold text-4xl text-center md:hidden">
            N<span class="text-teal-600">.</span>
        </h1>
        <h1 class="hidden md:block font-bold text-sm md:text-xl text-center">
            NongkiGame<span class="text-teal-600"></span>
        </h1>

        <!-- Profile section -->
        <div id="profile" class="space-y-3">
            <img src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                alt="Avatar user" class="w-10 md:w-16 rounded-full mx-auto" />
            <div>
                <h2 class="font-medium text-xs md:text-sm text-center text-teal-500">
                    Rizky Anugrah
                </h2>
                <p class="text-xs text-gray-500 text-center">Administrator</p>
            </div>
        </div>

        <!-- Search bar -->
        {{-- <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
            <input type="text"
                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                placeholder="Search" />
            <button class="rounded-tr-md rounded-br-md px-2 py-3 hidden md:block">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div> --}}

        <!-- Menu items -->
        <div id="menu" class="flex flex-col space-y-2">
            <a href="{{ route('dashboard') }}"
                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out hover:shadow-xl hover:shadow-teal-500/50">
                <svg class="w-6 h-6 fill-current inline-block" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('topup-package.index') }}"
                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out hover:shadow-xl hover:shadow-teal-500/50 ">
                <svg class="w-6 h-6 fill-current inline-block" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                <span>Produk</span>
            </a>

            <a href="{{ route('gallery.index') }}"
                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out hover:shadow-xl hover:shadow-teal-500/50 ">
                <svg class="w-6 h-6 fill-current inline-block" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                <span>Gallery</span>
            </a>

            <a href=""
                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out hover:shadow-xl hover:shadow-teal-500/50 ">
                <svg class="w-6 h-6 fill-current inline-block" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
                <span>Users</span>
            </a>
        </div>
    </div>


</div>
