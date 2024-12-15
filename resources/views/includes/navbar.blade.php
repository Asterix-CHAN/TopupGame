  <!-- Start Header -->
  <header class=" pt-2 top-0 fixed z-40 w-full items-center bg-slate-100 bg-opacity-75  backdrop-blur-lg backdrop-brightness-105">
      <div class="mx-7 md:container lg:mx-auto md:relative md:flex-row gap-y-4 md:gap-y-0 top-navbar ">
          <div class="flex h-[60px] justify-between">

              <div class="w-auto flex items-center py-2">
                  <!-- Start Hamburger Menu -->
                  <div class="w-10 h-10 items-center  justify-center rounded-md block md:hidden">
                      <button id="hamburger" type="button" class="font-medium md:text-2xl text-lg ">
                          <i class="fa-solid fa-bars rounded-md w-full"></i>
                      </button>
                  </div>
                  <!-- End Hamburger Menu -->
                  <!-- logo -->
                  <div class="flex justify-center md:justify-normal items-center">
                      <a href="#" class="font-semibold text-md md:text-xl lg:text-2xl"><img
                              src="{{ url('Game/src/images/logo/nongki.png') }}" alt="" srcset=""
                              class="w-10 md:w-13 object-cover object-center overflow-auto"></a>
                  </div>
                  <!-- End Logo -->
              </div>



              <!-- Navbar Menu -->
              <div class="flex items-center md:flex-row md:gap-x-10 md:gap-y-0">
                  <!-- List Menu dislpay MD -->
                  <div class="mx-3 hidden md:block md:self-stretch">
                      <ul id="menu" class="flex md:flex-row justify-center items-center h-full ">
                          <li class="mx-3 h-full">
                              <x-nav-link href="{{ route('home') }}" wire:navigate :active="request()->routeIs('home')">
                                  <i class="fa-solid fa-house"></i>{{ __('Beranda') }}
                              </x-nav-link>
                          </li>
                          <li class="mx-3 h-full">
                              <x-nav-link href="{{ route('games') }}" wire:navigate :active="request()->routeIs('games')">
                                  <i class="fa-solid fa-gamepad "></i>{{ __('Games') }}</x-nav-link>
                          </li>
                          <li class="mx-3 h-full">
                              <x-nav-link href="" wire:navigate><i
                                      class="fa-solid fa-money-bill"></i>{{ __('Transaksi') }}</x-nav-link>
                          </li>
                          <li class="mx-3 h-full">
                              <x-nav-link href="#_" wire:navigate><i
                                      class="fa-regular fa-newspaper"></i>{{ __('Blog') }}</x-nav-link>
                          </li>
                      </ul>
                  </div>
                  <div class="hidden xl:block xl:w-auto xl:ml-7"></div>
              </div>
              <!-- End Navbar Menu -->

              <!-- Start Search, Login -->
              <div class=" h-full items-center flex gap-x-1 md:gap-x-2  gap-y-4 md:flex-row md:gap-y-0 mr-2">
                  <!-- Search -->
                  <button  type="button"
                      class="font-medium md:text-2xl text-lg bg-transparent" x-data=''
                      x-on:click.prevent="$dispatch('open-modal', 'modal-search')"><i
                          class="fa-solid fa-magnifying-glass"></i>
                  </button>
                  {{--  --}}
            
                  <!--  Cart  -->
                  <div class="">
                      <a href="{{ route('cart-list') }}" id="cart"
                          class="font-medium text-lg md:text-2xl hover:text-white hover:bg-slate-600 mr-2 w-10 h-10 items-center flex justify-center rounded-md focus:text-white focus:bg-slate-600"><i
                              class="fa-solid fa-cart-shopping"></i></a>
                  </div>
                  @guest
                      <!-- User -->
                      <form action="{{ route('login') }}">
                          <button type="button"
                              class=" font-semibold transition-colors duration-300 ease-out hover:text-white hidden md:block text-sm  ml-4 px-4 py-2 rounded "
                              onclick="event.preventDefault(); location.href='{{ route('login') }}';">Masuk</button>
                      </form>

                      <!-- btn user Mobile -->
                      <div class=" block md:hidden relative">
                          <button id="menu-user" type="button"
                              class="font-medium text-lg md:text-xl hover:text-white hover:bg-slate-600 ml-2 w-10 h-10 items-center flex justify-center rounded-md focus:text-white focus:bg-slate-600"><i
                                  class="fa-solid fa-user"></i></button>
                          <!-- Dropdown -->
                          <div id="myDropdown"
                              class="dropdown-content absolute top-14 right-0  rounded-xl  w-[120px] h-auto  bg-white  items-center py-2 hidden ">
                              <div class="flex flex-col mx-auto w-full h-full items-center gap-y-2 px-5">
                                  <form action="{{ route('login') }}">
                                      <button
                                          class="font-semibold transition-colors duration-300 ease-out hover:text-slate-600 text-sm">Masuk</button>
                                  </form>
                                  <form action="{{ route('register') }}">
                                      <button
                                          class="px-4 py-2 text-xs font-bold text-white  transition-all duration-150 bg-cyan-700 rounded shadow outline-none hover:bg-emerald-600 hover:shadow-md focus:outline-none ease ">
                                          Daftar
                                      </button>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <!--  -->
                      <form action="{{ route('register') }}">
                          <button
                              class="px-4 py-2 text-sm font-semibold text-white  transition-all duration-150 bg-cyan-700 rounded shadow outline-none active:bg-emerald-600 hover:shadow-md focus:outline-none ease-in-out hidden md:block"
                              type="button" onclick="event.preventDefault(); location.href='{{ route('register') }}';">
                              Daftar
                          </button>
                      </form>
                  @endguest


                  @auth
                      <!-- User -->
                      {{-- Desktop --}}
                      <div class="relative ml-3 ">
                          <x-dropdown>
                              <x-slot name="trigger">
                                  <button
                                      class="relative flex max-w-xs items-center text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-1 focus:ring-offset-gray-600 focus:rounded-r-full pl-2"
                                      id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                      <span class="absolute -inset-1.5"></span>
                                      <span class="">{{ Auth::user()->name }}</span>
                                      <img class="h-8 w-8 rounded-full ml-1"
                                          src="{{ url('Game/src/images/content/apex-legends.jpg') }}" alt="">
                                  </button>
                              </x-slot>

                              <x-slot name='content'>
                                  <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-sm text-gray-700">
                                      {{ __('Your Profile') }}
                                  </x-dropdown-link>

                                  <x-dropdown-link :href="route('logout')" class="block px-4 py-2 text-sm text-gray-700">
                                      {{ __('Sign Out') }}
                                  </x-dropdown-link>
                              </x-slot>
                          </x-dropdown>
                      </div>
                      {{-- End Desktop --}}
                      <!-- btn user Mobile -->
                      {{-- <div class=" block md:hidden relative">
                          <button id="menu-user" type="button"
                              class="font-medium text-lg md:text-xl hover:text-white hover:bg-slate-600 ml-2 w-10 h-10 items-center flex justify-center rounded-md focus:text-white focus:bg-slate-600 "><i
                                  class="fa-solid fa-user"></i></button>
                          <!-- Dropdown -->
                          <div id="myDropdown"
                              class="dropdown-content absolute top-14 right-0  rounded-xl  w-[120px] h-auto  bg-white  items-center py-2 hidden ">
                              <div class="flex flex-col mx-auto w-full h-full items-center gap-y-2 px-5">
                                  <form action="{{ url('profile.edit') }}">
                                      <button
                                          class="font-semibold transition-colors duration-300 ease-out hover:text-slate-600 text-sm"
                                          type="submit">Profil</button>
                                  </form>

                                  <a href="{{ route('logout') }}"
                                      class="px-4 py-2 text-xs font-bold text-white  transition-all duration-150 bg-cyan-700 rounded shadow outline-none hover:bg-emerald-600 hover:shadow-md focus:outline-none ease ">
                                      Keluar
                                  </a>

                              </div>
                          </div>
                      </div> --}}
                      <!--  -->
                  @endauth
                  <!-- End Search, Login -->
              </div>
          </div>
  </header>
  <!-- END Header -->

  <!-- Mobile Nav -->
  <!-- bg offcanvas -->
  <div
      class="bg-black hidden fixed  w-screen h-screen bg-opacity-85 md:hidden transition-all duration-500 ease-in-out z-40 background-offcanvas">
  </div>
  <!-- bg offcanvas -->
  <nav
      class="mnav bg-white fixed w-[300px]  h-screen -left-[300px] shadow-2xl md:hidden transition-all duration-300 ease-in-out z-50">

      <div class="btnNav w-8 h-8 relative -right-64 top-6 flex justify-center cursor-pointer transition-all  ">
          <button id="btnNavIcon" type="button" class="text-3xl ">
              <i class="fa-solid fa-xmark"></i>
          </button>
      </div>

      <!-- Logo, List -->
      <div class="px-12 flex flex-col gap-y-2 top-0 ">
          <!-- logo -->

          <a href="#" class="self-start font-medium pl-2 pt-7 "><img
                  src="{{ url('Game/src/images') }}/logo/logo aov.png" alt="" srcset=""
                  class="w-24 object-cover 0"></a>

          <!-- List -->
          <ul>
              <li class="w-auto rounded-lg flex my-2">
                  <x-side-link href="{{ route('home') }}" class=" w-full " wire:navigate :active="request()->routeIs('home')"><i
                          class="fa-solid fa-house pl-2"></i><span class="pl-2">Home</span></x-side-link>
              </li>
              <li class="w-auto rounded-lg flex my-2">
                  <x-side-link href="{{ route('games') }}" class="w-full" wire:navigate :active="request()->routeIs('games')"> <i
                          class="fa-solid fa-gamepad pl-2"></i><span class="pl-2">Games</span></x-side-link>
              </li>
              <li class="w-auto rounded-lg flex my-2">
                  <x-side-link href="#" class=" w-full "><i class="fa-solid fa-money-bill pl-2"></i><span
                          class="pl-2">Transaksi</span></x-side-link>
              </li>
              <li class="w-auto rounded-lg flex my-2">
                  <x-side-link href="#" class=" w-full"><i class="fa-regular fa-newspaper pl-2"></i><span
                          class="pl-2">Blog</span></x-side-link>
              </li>
          </ul>
      </div>

  </nav>
  <!-- End Mobile Nav-->

  {{-- Modal Search --}}
  <x-modal name="modal-search">
    <div
        class="relative mx-auto transform overflow-hidden rounded-lg bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="w-full text-end pt-2 pr-2">
          <x-secondary-button x-on:click="$dispatch('close')">
              <i class="fa-solid fa-xmark w-3 h-3"></i>
          </x-secondary-button>
      </div>

        <div class="bg-white px-6 pb-8 pt-8 sm:p-8 my-auto rounded-t-lg border-b border-gray-200">
           
            <div class="w-full">
                <form method="get" action="">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="w-full">
                                <div class="mb-6">
                                    <label
                                        class="block text-gray-800 text-sm font-semibold mb-2">Search</label>
                                    <div class="relative">
                                        <x-text-input type="text" name="name"
                                            value="{{ old('name') }}"
                                            class="w-full pl-10 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Search">
                                        </x-text-input>
                                        <i
                                            class="fa-solid fa-magnifying-glass absolute left-3 top-3 h-5 w-5"></i>
                                        @error('name')
                                            <x-input-error :messages="$message"
                                                class="text-red-500 mt-1"></x-input-error>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div
            class="flex bg-gray-50 px-6 py-4 rounded-b-lg border-t border-gray-200 sm:flex sm:flex-row gap-3 justify-end sm:px-8">

            <x-primary-button
                class="text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg px-4 py-2">
                {{ __('Search') }}
            </x-primary-button>
        </div>
        </form>
    </div>

</x-modal>