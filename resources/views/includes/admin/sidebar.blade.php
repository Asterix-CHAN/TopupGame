<div
    class="bg-black block fixed inset-0 w-screen h-screen bg-opacity-85 md:hidden z-10 ">
</div>

<div id="sidebar"
    class="bg-white fixed  md:relative h-full w-1/2 md:w-full inset-0 md:block shadow-xl px-3 z-20 rounded-r-2xl overflow-x-hidden decoration-none box-shadow ">

    <div class="space-y-6 md:space-y-10 mt-10 container">
        <div class="flex items-end justify-end">
            <button
                class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] text-gray-500 hover:bg-blue-gray-500/10  md:hidden items-center"
                type="button" @click="open = !open">
               
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[30px] h-[30px] fill-current inline-block" viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
               
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
            {{-- <img src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                alt="Avatar user" class="w-10 md:w-16 rounded-full mx-auto" /> --}}
            <div>
                <h2 class="font-semibold text-sm md:text-md text-center text-teal-500">
                    {{ Auth::user()->name }}
                </h2>
                <p class="text-xs md:text-sm text-gray-500 text-center">{{ Auth::user()->roles->pluck('name')->implode(', ') }}</p>
            </div>
        </div>

        <!-- Menu items -->
        <div id="menu" class="flex flex-col space-y-2">
            <x-side-link href="{{ route('dashboard') }}" wire:navigate :active="request()->routeIs('dashboard')" >
                <svg class="w-5 h-5 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm64 192c17.7 0 32 14.3 32 32l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 192c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-192zM320 288c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32c0-17.7 14.3-32 32-32z"/></svg>  
                <span>Dashboard</span>
            </x-side-link>

            <x-side-link href="{{ route('topup-package.index') }}" wire:navigate :active="request()->routeIs('topup-package.index')" >
                <svg class="w-5 h-5 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm64 64l0 256 160 0 0-256L64 160zm384 0l-160 0 0 256 160 0 0-256z"/></svg>
                <span>Produk</span>
            </x-side-link>

            <x-side-link href="{{ route('category.index') }}" wire:navigate :active="request()->routeIs('category.index')" >
                <svg class="w-5 h-5 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M345 39.1L472.8 168.4c52.4 53 52.4 138.2 0 191.2L360.8 472.9c-9.3 9.4-24.5 9.5-33.9 .2s-9.5-24.5-.2-33.9L438.6 325.9c33.9-34.3 33.9-89.4 0-123.7L310.9 72.9c-9.3-9.4-9.2-24.6 .2-33.9s24.6-9.2 33.9 .2zM0 229.5L0 80C0 53.5 21.5 32 48 32l149.5 0c17 0 33.3 6.7 45.3 18.7l168 168c25 25 25 65.5 0 90.5L277.3 442.7c-25 25-65.5 25-90.5 0l-168-168C6.7 262.7 0 246.5 0 229.5zM144 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                <span>Category</span>
            </x-side-link>

            <x-side-link href="{{ route('gallery.index') }}" wire:navigate :active="request()->routeIs('gallery.index')" >
                <svg class="w-5 h-5 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M160 32c-35.3 0-64 28.7-64 64l0 224c0 35.3 28.7 64 64 64l352 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320l-144 0-48 0-80 0c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 344c0 75.1 60.9 136 136 136l320 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-320 0c-48.6 0-88-39.4-88-88l0-224z"/></svg>
                <span>Gallery</span>
            </x-side-link>

            <x-side-link href="{{ route('users.show') }}" wire:navigate  :active="request()->routeIs('users.show')">
                <svg class="w-6 h-6 fill-current inline-block" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
                <span>Users</span>
            </x-side-link>
        </div>
    </div>


</div>
