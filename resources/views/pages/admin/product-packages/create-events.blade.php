<x-app-layout>
    <x-slot name="header">


        <div class="md:container mx-auto sm:px-8 lg:px-10 pl-2">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Tambah Produk Event') }}
            </h2>
        </div>
    </x-slot>

    <main>
        <div class="main-wrapper flex flex-col mb-5">
            <div class="main-content flex">
                <div class="container w-full md:w-1/2">
                    <form method="post" action="{{ route('events.store') }}">
                        @csrf
                        <div class="card mt-5">
                            <div class="card-body flex gap-2">
                                <div class="w-full">

                                    <div class="mb-4">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            name="game_id" id="grid-state">
                                            <option value="{{ $diamonds->game_packages->id }}">
                                                {{ $diamonds->game_packages->name }}</option>
                                        </select>
                                        @error('game_id')
                                            <x-input-error :messages="$message"></x-input-error>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 "
                                            name="diamond_id" id="grid-state">
                                            <option value="{{ $diamonds->id }}">{{ $diamonds->diamond }}</option>
                                        </select>
                                        @error('diamond_id')
                                            <x-input-error :messages="$message"></x-input-error>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="bg-white p-6 rounded-lg shadow-lg gap-3 flex flex-col">
                                            <h1 class="text-2xl font-semibold mb-4">Tambah Produk Events</h1>
                                            <p>Harga Awal {{ $diamonds->price }}</p>
                                            {{-- <p>Harga Awal Event {{ $events->price ?? 0 }}</p> --}}
                                            <div class="mb-4">
                                                <label for="price"
                                                    class="block text-gray-700 text-sm font-bold mb-2">Harga
                                                    Event</label>
                                                <x-text-input type="number" name="price" class="block"
                                                    placeholder="Harga Event"></x-text-input>
                                                @error('price')
                                                    <x-input-error :messages="$message"></x-input-error>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="diamond_event"
                                                    class="block text-gray-700 text-sm font-bold mb-2">Jumlah Diamond
                                                    Event</label>
                                                <x-text-input type="number" name="diamond_event" class="block"
                                                    placeholder="Jumlah Diamond Event"></x-text-input>
                                                @error('diamond_event')
                                                    <x-input-error :messages="$message"></x-input-error>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer flex justify-end">
                            <x-primary-button>Create</x-primary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </main>
</x-app-layout>
