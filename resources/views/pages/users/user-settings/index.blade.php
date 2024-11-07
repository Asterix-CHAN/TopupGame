@extends('layouts/account')

@section('title', 'account')

@section('content')
    <main class="w-full flex flex-col md:flex-row pt-24">
        <div class="basis-full md:basis-1/5 bg-white shadow-md rounded-lg mx-6 md:mr-6 md:ml-0 p-2 mb-4 md:mb-0">
            <div class="flex justify-center items-center mb-6">
                <img src="https://bmw.astra.co.id/wp-content/uploads/2023/07/BMW.svg_.png" class="h-16 w-16 object-cover rounded-full border-2 border-gray-300" alt="">
                <div class="flex flex-col ml-2">
                    <p class="font-medium text-sm">rizky gmail</p>
                    <p class="font-light text-xs text-slate-500">ubah profil</p>
                </div>
            </div>

            <div class="flex flex-col">
                <div x-data="{ open: false }" class="flex flex-col">
                    <button @click="open = !open"
                        class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg transition duration-300 focus:outline-none">
                        <i class="fa-solid fa-user mr-2"></i>
                        Akun Saya
                        <i class="fa-solid fa-chevron-down ml-auto" :class="{ 'rotate-180': open }"></i>
                    </button>
                    <div x-show="open" class="pl-6 transition duration-300 ease-in-out" x-cloak>
                        <a href="#"
                            class="block py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition duration-300">Data Diri</a>
                            <a href="#"
                            class="block py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition duration-300">Ubah Password</a>
                        <a href="#"
                            class="block py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition duration-300">Pengaturan
                            Notifikasi</a>
                        <a href="#"
                            class="block py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition duration-300">Pengaturan
                            Privasi</a>
                    </div>
                </div>
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg transition duration-300">
                    <i class="fa-solid fa-box mr-2"></i>
                    Pesanan Saya
                </a>
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg transition duration-300">
                    <i class="fa-solid fa-bell mr-2"></i>
                    Notifikasi
                </a>
            </div>
        </div>

        <div class="basis-full md:basis-1/2 bg-white shadow-lg rounded-lg p-4 mx-6 md:m-0  mb-4 md:mb-0">
            <h2 class="font-semibold text-2xl text-gray-800 mb-2">Profil Saya</h2>
            <p class="font-primary text-base text-gray-600 mb-6">Kelola informasi profil Anda untuk mengontrol, melindungi,
                dan mengamankan akun</p>

            <div
                class="flex w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 transition duration-300">
                <form action="" class="w-full">
                    <div class="card w-full">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-1">Username</label>
                            <x-text-input type="text" name="name" value=""
                                class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-1">Email</label>
                            <x-text-input type="text" name="email" value=""
                                class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="mb-4">
                            <label for="phoneNumber" class="block text-gray-700 text-sm font-bold mb-1">No Telepon</label>
                            <x-text-input type="text" name="phoneNumber" value=""
                                class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="mb <div class="mb-4 flex flex-col">
                            <h4 class="block text-gray-700 text-sm font-bold mb-1">Jenis Kelamin</h4>
                            <div class="flex items-center mb-2">
                                <input id="default-radio-1" type="radio" value="male" name="gender"
                                    class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" />
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900">Laki-laki</label>
                            </div>
                            <div class="flex items-center">
                                <input id="default-radio-2" type="radio" value="female" name="gender"
                                    class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" />
                                <label for="default-radio-2"
                                    class="ms-2 text-sm font-medium text-gray-900">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 text-sm font-bold mb-1">Tanggal Lahir</label>
                            <input type="date" name="date"
                                class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="card-footer flex justify-end mt-6">
                            <x-primary-button
                                class="bg-blue-600 text-white rounded-lg py-2 px-4 hover:bg-blue-700 transition duration-300">{{ __('Submit') }}</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div
            class="basis-full md:basis-1/3  bg-gradient-to-r from-blue-200 to-white mx-6 md:ml-4 md:m-0 p-2 rounded-lg shadow-lg mb-4 md:mb-0">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800">Riwayat Aktivitas</h2>
                <a href="#"
                    class="text-blue-600 hover:text-blue-800 font-medium text-sm transition duration-300">Lihat Semua</a>
            </div>
            <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-2 overflow-x-auto">
                <a href="#"
                    class="text-xs items-center text-center flex flex-col border border-blue-300 rounded-lg p-2 hover:bg-blue-100 transition duration-300 overflow-x-hidden">
                    <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor"
                            d="M512 80c8.8 0 16 7.2 16 16l0 32L48 128l0-32c0-8.8 7.2-16 16-16l448 0zm16 144l0 192c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16l0-192 480 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24l48 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0z" />
                    </svg>
                    {{ __('Menunggu Pembayaran') }}
                </a>

                <a href="#"
                    class="text-xs items-center text-center flex flex-col border border-blue-300 rounded-lg p-2 hover:bg-blue-100 transition duration-300 overflow-x-hidden">
                    <i class="fa-solid fa-truck-fast h-8 w-8 text-blue-500"></i>
                    {{ __('Menunggu Dikirim') }}
                </a>

                <a href="#"
                    class="text-xs items-center text-center flex flex-col border border-blue-300 rounded-lg p-2 hover:bg-blue-100 transition duration-300 overflow-x-hidden">
                    <i class="fa-solid fa-box-archive h-8 w-8 text-blue-500"></i>
                    {{ __('Sudah Terkirim') }}
                </a>

                <a href="#"
                    class="text-xs items-center text-center flex flex-col border border-blue-300 rounded-lg p-2 hover:bg-blue-100 transition duration-300 overflow-x-hidden">
                    <i class="fa-solid fa-clipboard-check h-8 w-8 text-blue-500"></i>
                    {{ __('Selesai') }}
                </a>
            </div>
        </div>
    </main>
@endsection
