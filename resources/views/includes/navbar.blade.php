  <!-- Start Header -->
  <header class=" pt-2 top-0 fixed z-40 w-full shadow-lg items-center ">
      <div class="container mx-auto md:relative md:flex-row gap-y-4 md:gap-y-0 top-navbar">
          <div class="flex h-[60px] justify-between">
              <!-- Start Hamburger Menu -->
              <div class="w-auto block md:hidden py-2">
                  <div class="w-10 h-10 items-center flex justify-center rounded-md">
                      <button id="hamburger" type="button" class="font-medium md:text-2xl text-lg ">
                          <i class="fa-solid fa-bars rounded-md "></i>
                      </button>
                  </div>
              </div>
              <!-- End Hamburger Menu -->
              <!-- logo -->
              <div class="flex justify-center md:justify-normal items-center">
                  <a href="#" class="font-semibold text-md md:text-xl lg:text-2xl"><img
                          src="{{ url('Game/src/images/logo/logo aov.png') }}" alt="" srcset=""
                          class="w-24 object-cover"></a>
              </div>
              <!-- End Logo -->

              <!-- Navbar Menu -->
              <div class="flex items-center md:flex-row md:gap-x-10 md:gap-y-0">
                  <!-- List Menu dislpay MD -->
                  <div class="mx-3 hidden md:block md:self-stretch">
                      <ul id="menu" class="flex md:flex-row justify-center items-center h-full ">
                          <li class="mx-3 h-full">
                              <a href="{{ route('home') }}"
                                  class="h-full relative z-10 -mb-px flex items-center border-b-4 border-spacing-y-6 font-medium transition-colors duration-300 ease-out border-transparent hover:border-collapse hover:border-white hover:text-white gap-x-2 "><i
                                      class="fa-solid fa-house "></i>Beranda</a>
                          </li>
                          <li class="mx-3 h-full">
                              <a href="{{ route('games') }}"
                                  class="h-full relative z-10 -mb-px flex items-center border-b-4 border-spacing-y-6 font-medium transition-colors duration-300 ease-out border-transparent hover:border-collapse hover:border-white hover:text-white gap-x-2 "><i
                                      class="fa-solid fa-gamepad "></i>Games</a>
                          </li>
                          <li class="mx-3 h-full">
                              <a href="#_"
                                  class="h-full relative z-10 -mb-px flex items-center border-b-4 border-spacing-y-6 font-medium transition-colors duration-300 ease-out border-transparent hover:border-collapse hover:border-white hover:text-white gap-x-2"><i
                                      class="fa-solid fa-money-bill"></i>Transaksi</a>
                          </li>
                          <li class="mx-3 h-full">
                              <a href="#_"
                                  class="h-full relative z-10 -mb-px flex items-center border-b-4 border-spacing-y-6 font-medium transition-colors duration-300 ease-out border-transparent hover:border-collapse hover:border-white hover:text-white gap-x-2"><i
                                      class="fa-regular fa-newspaper"></i>Blog</a>
                          </li>
                      </ul>
                  </div>
                  <div class="hidden xl:block xl:w-auto xl:ml-7"></div>
              </div>
              <!-- End Navbar Menu -->

              <!-- Start Search, Login -->
              <div class=" h-full items-center flex gap-x-1 md:gap-x-2  gap-y-4 md:flex-row md:gap-y-0">
                  <!-- Search -->
                  <div
                      class="transition-colors duration-300 ease-out hover:text-white hover:bg-slate-600  w-10 h-10 items-center flex justify-center rounded-md focus:text-white focus:bg-slate-600">
                      <button id="searchBtn" type="button" class="font-medium md:text-2xl text-lg "><i
                              class="fa-solid fa-magnifying-glass"></i></button>

                  </div>
                  <!-- Search Form -->
                  <div id="searchModal" class="modal hidden z-50">
                      <div class="w-screen h-screen fixed inset-0 bg-slate-700 bg-opacity-80 left-0 top-0 closeBtn">
                      </div>
                      <form action=""
                          class="absolute -bottom-20 flex items-center self-end bg-slate-800 rounded-xl inset-0 mx-auto w-[300px] md:w-[600px] h-[50px] text-white">
                          <label for="nav-search" class="mx-2 pl-2">
                              <i class="fa-solid fa-magnifying-glass mr-2 "></i>
                          </label>
                          <input type="text" id="nav-search" placeholder="Search..."
                              class="outline-none w-full h-full placeholder:italic rounded-r-lg border-none bg-slate-800 focus:outline-none focus:ring-0 focus:border-0 hover:rounded-lg">
                      </form>
                  </div>
                  <!--  -->
                  <!--  Cart  -->
                  <div class="">
                      <a href="#" id="cart"
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
                        <div class="relative ml-3 lg:block hidden" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" @keydown.escape="open = false" type="button" class="relative flex max-w-xs items-center text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:rounded-r-full focus:rounded-l-lg" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="">{{ Auth::user()->name }}</span>
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </button>
                            </div>
                            <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                            </div>
                        </div>
                   {{-- End Desktop --}}
                    <!-- btn user Mobile -->
                    <div class=" block md:hidden relative">
                        <button id="menu-user" type="button"
                            class="font-medium text-lg md:text-xl hover:text-white hover:bg-slate-600 ml-2 w-10 h-10 items-center flex justify-center rounded-md focus:text-white focus:bg-slate-600"><i
                                class="fa-solid fa-user"></i></button>
                        <!-- Dropdown -->
                        <div id="myDropdown"
                            class="dropdown-content absolute top-14 right-0  rounded-xl  w-[120px] h-auto  bg-white  items-center py-2 hidden ">
                            <div class="flex flex-col mx-auto w-full h-full items-center gap-y-2 px-5">
                                <form action="{{ url('profile.edit') }}">
                                    <button
                                        class="font-semibold transition-colors duration-300 ease-out hover:text-slate-600 text-sm" type="button">Profil</button>
                                </form>
                                <form method="POST" action="{{ url('logout') }}">
                                    @csrf
                                    <button
                                        class="px-4 py-2 text-xs font-bold text-white  transition-all duration-150 bg-cyan-700 rounded shadow outline-none hover:bg-emerald-600 hover:shadow-md focus:outline-none ease " type="submit">
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
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
                  <a href="index.html"
                      class="hover:text-white rounded-lg transition-all duration-300 w-full hover:bg-sky-500"><i
                          class="fa-solid fa-house pl-2"></i><span class="pl-2">Home</span></a>
              </li>
              <li class="w-auto rounded-lg flex my-2">
                  <a href="games.html"
                      class="hover:text-white rounded-lg transition-all duration-300 w-full hover:bg-sky-500"><i
                          class="fa-solid fa-gamepad pl-2"></i><span class="pl-2">Games</span></a>
              </li>
              <li class="w-auto rounded-lg flex my-2">
                  <a href="#"
                      class="hover:text-white rounded-lg transition-all duration-300 w-full hover:bg-sky-500"><i
                          class="fa-solid fa-money-bill pl-2"></i><span class="pl-2">Transaksi</span></a>
              </li>
              <li class="w-auto rounded-lg flex my-2">
                  <a href="#"
                      class="hover:text-white rounded-lg transition-all duration-300 w-full hover:bg-sky-500"><i
                          class="fa-regular fa-newspaper pl-2"></i><span class="pl-2">Blog</span></a>
              </li>
          </ul>
      </div>

  </nav>
  <!-- End Mobile Nav-->
