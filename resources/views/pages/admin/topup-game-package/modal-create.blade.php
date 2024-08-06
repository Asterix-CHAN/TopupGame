<div class="relative z-10 " aria-labelledby="modal-title" role="dialog" aria-modal="true" x-on:click="show = false"
    x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-40" aria-hidden="true"></div>

    <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg ">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 ">
                    <div class=" w-full ">
                        {{--  --}}
                        <form method="post" action="{{ route('topup-package.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if (Session::has('success'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: '{{ Session::get('success') }}'
                                    });
                                </script>
                            @endif

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

                            <div class="card mt-5">
                                <div class="card-body flex gap-2">
                                    <div class="w-full">
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                            <x-text-input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Name"></x-text-input>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Developer</label>
                                            <x-text-input type="text" name="developer" value="{{ old('developer') }}"
                                                placeholder="Developer"></x-text-input>
                                        </div>
                                        <div class="mb-4">
                                            <label
                                                class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                            <x-text-input type="text" name="description"
                                                value="{{ old('description') }}"
                                                placeholder="Description"></x-text-input>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">About</label>
                                            <textarea type="text" cols="50"
                                                class="shadow appearance-none border rounded w-full px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                name="about" placeholder="About">{{ old('about') }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                                            <x-text-input type="text" name="price" value="{{ old('price') }}"
                                                placeholder="Price"></x-text-input>
                                        </div>
                                        <div class="mb-2">
                                            <label for="category_id"
                                                class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                                            <select name="category_id[]" id="category_id"
                                                class="select2-multiple" multiple>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="platforms"
                                                class="block text-gray-700 text-sm font-bold mb-2">Platform</label>
                                            <select name="platform_id"
                                                class="w-full rounded-md" >
                                                <option disabled>Pilih Platform!</option>

                                                @foreach ($platforms as $platform)
                                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Stock</label>
                                            <x-text-input type="text" name="stock" value="{{ old('stock') }}"
                                                placeholder="Stock"></x-text-input>
                                        </div>

                                        <div class="mb-4">
                                            <label for="formFile"
                                                class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                                            <x-text-input type="text" type="file" name="image"
                                                id="formFile"></x-text-input>
                                        </div>
                                    </div>
                                </div>

                            </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row gap-2 justify-end sm:px-6">
                    <x-primary-button type='submit'>Create</x-primary-button>
                    </form>
                    <x-secondary-button @click="isOpen = !isOpen">Cancel</x-secondary-button>
                </div>

            </div>
        </div>
    </div>
</div>
