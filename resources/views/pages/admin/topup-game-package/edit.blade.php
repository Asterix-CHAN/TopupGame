<x-app-layout>
    <x-slot name="header">

        {{ Breadcrumbs::render('game-packages.edit', $item) }}

        <div class="md:container mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Edit Produk') }}
            </h2>
        </div>
    </x-slot>


    <main>
        <div class="main-wrapper flex flex-col mb-5">
            <div class="main-content">
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
                    <form method="post" action="{{ route('game-packages.update', $item->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card mt-5">

                            <div class="card-body flex gap-2">
                                <div class="w-full">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                        <x-text-input type="text" name="name"
                                            value="{{ $item->name }}"></x-text-input>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Developer</label>
                                        <x-text-input type="text" name="developer"
                                            value="{{ $item->developer }}"></x-text-input>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                        <x-text-input type="text" name="description"
                                            value="{{ $item->description }}"></x-text-input>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">About</label>
                                        <textarea type="text" cols="30" rows="10"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            name="about">{{ $item->about }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                                        <x-text-input type="text" name="price"
                                            value="{{ $item->price }}"></x-text-input>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Stock</label>
                                        <x-text-input type="text" name="stock"
                                            value="{{ $item->stock }}"></x-text-input>
                                    </div>
                                    <div class="mb-4">
                                        <select name="category_id[]" id="category_id"
                                            class="select2-multiple shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline overflow-y-hidden"
                                            multiple>
                                            @forelse ($categories as $category)
                                                <option
                                                    value="{{ $category->id }}"{{ in_array($category->id, old('category_id', $item->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @empty
                                                <span>Data Kosong</span>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Platform</label>
                                        <select name="platform_id"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="">
                                            @forelse ($platforms as $platform)
                                                <option value="{{ $platform->id }}"
                                                    {{ $item->platform_id === $platform->id ? 'selected' : '' }}>
                                                    {{ $platform->name }}</option>
                                            @empty
                                                <span>Data Kosong!</span>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <div class="bg-white p-6 rounded-lg shadow-lg">
                                            <h1 class="text-2xl font-semibold mb-4">Upload an Image</h1>
                                            <div class="preview mt-4 mb-3" id="imagePreview">
                                                @if ($item->image)
                                                    <div class="mt-2">
                                                        <img src="{{ Storage::url($item->image) }}" alt="Current Image"
                                                            class="max-w-xs max-h-xs rounded-lg shadow-lg border border-collapse aspect-video">
                                                    </div>
                                                @endif
                                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">PNG, JPG, JPEG
                                                    (MAX. 2MB)</p>
                                            </div>
                                            <x-text-input type="file" name="image" id="imageLoad"></x-text-input>
                                        </div>
                                    </div>
                                    <div class="card-footer flex justify-end">
                                        <x-primary-button>{{ __('Ubah') }}</x-primary-button>
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

    @push('addon-script')
        <script>
            const imageUpload = document.getElementById('imageLoad'); 
            const imagePreview = document.getElementById('imagePreview');

            imageUpload.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.addEventListener('load', function() {
                        const result = reader.result;
                        imagePreview.innerHTML =
                            `<img src="${result}" alt="Current Image" class="max-w-xs max-h-xs rounded-lg shadow-lg border border-collapse ">`;
                    });

                    reader.readAsDataURL(file);
                }
            });
        </script>
    @endpush

</x-app-layout>
