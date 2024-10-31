<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('platform.edit', $item) }}
        <div class="md:container mx-auto sm:px-6 lg:px-8">

            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Edit Platform') }}
            </h2>
        </div>
    </x-slot>


    <main>
        <div class="main-wrapper flex flex-col mb-5">
            <div class="main-content">
                <div class="container w-1/2">
                    <form method="post" action="{{ route('platform.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card mt-5">

                            <div class="card-body flex gap-2">
                                <div class="w-full">
                                    <div class="mb-4">
                                        <label
                                            class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>
                                        <x-text-input type="text" name="name"
                                            value="{{ $item->name }}"></x-text-input>
                                            @error('name')
                                            <x-input-error :messages="$message"></x-input-error>
                                         @enderror
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer flex justify-end">
                            <x-primary-button type='submit'>{{ __('Ubah') }}</x-primary-button>
                        </div>
                </div>
                </form>
            </div>
            {{-- righ content --}}
            <div class="w-1/2">
                @yield('content')
            </div>
        </div>

        </div>
    </main>

</x-app-layout>
