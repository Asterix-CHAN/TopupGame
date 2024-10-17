<x-app-layout>
    <x-slot name="header">
        

        <div class="md:container mx-auto sm:px-8 lg:px-10">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Product Event') }}
            </h2>
        </div>
    </x-slot>
    <form method="post" action="{{ route('events.store') }}">
        @csrf
        <div class="card mt-5">
            <div class="card-body flex gap-2">
                <div class="w-full">

                    <div class="mb-4">
                        <select
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="game_id" id="grid-state">
                       
                            <option value="{{ $data->game_packages->id }}">{{ $data->game_packages->name }}</option>
                    
                          
                        </select>
                        @error('game_id')
                            <x-input-error :messages="$message"></x-input-error>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <select
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 "
                            name="diamond_id" id="grid-state">
                            <option value="{{ $data->id }}">{{ $data->diamond}}</option>
                        </select>
                        @error('diamond_id')
                            <x-input-error :messages="$message"></x-input-error>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <div class="bg-white p-6 rounded-lg shadow-lg gap-3 flex flex-col">
                            <h1 class="text-2xl font-semibold mb-4">Tambah Produk Events</h1>
                            <p>Harga Diamond {{ $data->price }}</p>
                            <x-text-input type="number" name="price" class="block"
                                placeholder="Harga"></x-text-input>
                            @error('price')
                                <x-input-error :messages="$message"></x-input-error>
                            @enderror

                            {{-- <x-text-input type="number" name="diamond_event" class="block"
                                placeholder="diamond Event"></x-text-input>
                            @error('diamond_event')
                                <x-input-error :messages="$message"></x-input-error>
                            @enderror --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer flex justify-end">
            <x-primary-button>Create</x-primary-button>
        </div>
    </form>
</x-app-layout>