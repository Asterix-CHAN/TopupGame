<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register') }}
        </h2>
    </x-slot>


    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- phone number --}}
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <div x-data="{ show: true }" class="relative mt-2 rounded-md shadow-sm flex flex-row">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span x-show="show" class="text-gray-500 sm:text-sm">+62</span>
                </div>
                <x-text-input x-on:click="show = false" x-on:blur="show = $event.target.value === '' ? true : false"
                    id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')"
                    required autofocus autocomplete="phon_number" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div x-data="{ showPassword: false }" class="text-end">
                <input id="password"
                    class="block mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :type="showPassword ? 'text' : 'password'" name="password" required autocomplete="new-password" />

                <input type="checkbox" id="togglePassword" x-model="showPassword"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                <label for="togglePassword" class="ms-2 text-sm text-gray-600">Show Password</label>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div x-data="{ showPassword: false }" class="text-end">

                <input id="password_confirmation"
                    class="block mt-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    :type="showPassword ? 'text' : 'password'" name="password_confirmation" required
                    autocomplete="new-password" />

                <input type="checkbox" id="togglePassword" x-model="showPassword"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                <label for="togglePassword" class="ms-2 text-sm text-gray-600">Show Password</label>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">


            <x-primary-button
                class="flex font-sans w-full justify-center rounded-md bg-indigo-600 px-3  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                {{ __('Daftar Searang') }}
            </x-primary-button>
        </div>
    </form>

    <!--  Pesan -->
    <div class="mt-4 text-center">
        <div class="grid grid-cols-6 items-center">
            <hr class="my-2 border-gray-300">
            <p class="text-sm font-normal my-4 col-start-2 col-span-4">Atau masuk dengan</p>
            <hr class="my-2 border-gray-300">
        </div>
        <!-- Button Login Google -->
        <button type="submit"
            class="flex w-full justify-center rounded-md bg-white px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 border-2 items-center hover:bg-slate-600 hover:text-white"><i
                class="fa-brands fa-google mr-6"></i>Masuk dengan Google
        </button>
    </div>
    <!-- Sudah Punya Akun -->
    <p class="mt-10 text-center text-sm text-gray-500">
        Sudah punya akun?
        <a class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500" href="{{ route('login') }}">
            {{ __('Masuk Sekarang') }}
        </a>
    </p>
    <!--  -->
</x-guest-layout>
