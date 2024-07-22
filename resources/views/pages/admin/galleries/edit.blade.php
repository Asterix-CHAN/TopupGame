<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3 ml-4">
            {{ __('Edit Image') }}
        </h2>
    </x-slot>


    <main>
        <div class="main-wrapper flex flex-col mb-5">
            <div class="main-content flex">
                <div class="container w-1/2">
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <div class="alert-title">
                            <h4 class="text-lg font-semibold">Whoops!</h4>
                        </div>
                        <span class="block sm:inline">There are some problems with your input.</span>
                        <ul class="mt-2 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="post" action="{{ route('gallery.update', $galeri->id) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>New Product</h3>
                            </div>
                            <div class="card-body flex gap-2">
                                <div class="w-full">
                                    <div class="mb-4">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="topupgame_packages_id" required id="grid-state">
                                            @foreach ($game as $gam)
                                            <option value="{{ $gam->id }}" {{ ($galeri->topupgame_packages_id === $gam->id) ? 'selected' : ''}}>{{ $gam->name }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="formFile"
                                            class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            type="file" name="image" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- righ content --}}
                <div class="w-1/2 container">

                </div>
            </div>

        </div>
    </main>

</x-app-layout>
