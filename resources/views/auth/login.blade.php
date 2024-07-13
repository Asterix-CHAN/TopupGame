<x-guest-layout>

    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Log In') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="flex items-center justify-between">
            <x-input-label for="password" :value="__('Password')" />
            @if (Route::has('password.request'))
                <a class="underline text-sm font-semibold text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex mt-4 items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            
                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
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
                class="fa-brands fa-google mr-6"></i>Masuk dengan Google</button>
    </div>
    <!-- Belum Punya Akun -->
    <p class="mt-10 text-center text-sm text-gray-500">
        Belum punya akun ?
        <a href="{{ route('register') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Daftar
            sekarang</a>
    </p>
    <!--  -->
</x-guest-layout>
