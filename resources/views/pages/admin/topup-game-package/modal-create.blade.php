<div class="relative z-10 " aria-labelledby="modal-title" role="dialog" aria-modal="true" x-on:click="show = false">

    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        aria-hidden="true"></div>

    <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg ">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 my-auto">
                    <div class=" w-full ">
                        {{--  --}}
                        <form method="post" action="{{ route('game-packages.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card mt-5">
                                <div class="card-body flex gap-2">
                                    <div class="w-full">
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                            <x-text-input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Name"></x-text-input>
                                            @error('name')
                                                <x-input-error :messages="$message"></x-input-error>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Developer</label>
                                            <x-text-input type="text" name="developer" value="{{ old('developer') }}"
                                                placeholder="Developer"></x-text-input>
                                            @error('developer')
                                                <x-input-error :messages="$message"></x-input-error>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label
                                                class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                            <x-text-input type="text" name="description"
                                                value="{{ old('description') }}"
                                                placeholder="Description"></x-text-input>
                                            @error('description')
                                                <x-input-error :messages="$message"></x-input-error>
                                            @enderror

                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">About</label>
                                            <textarea type="text" cols="50"
                                                class="shadow appearance-none border rounded w-full px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                name="about" placeholder="About">{{ old('about') }}</textarea>
                                            @error('about')
                                                <x-input-error :messages="$message"></x-input-error>
                                            @enderror
                                        </div>

                                        <div class="mb-2">
                                            <label for="category_id"
                                                class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                                            <select name="category_id[]" id="category_id" class="select2-multiple"
                                                multiple>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id[]')
                                                <x-input-error :messages="$message"></x-input-error>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="platforms"
                                                class="block text-gray-700 text-sm font-bold mb-2">Platform</label>
                                            <select name="platform_id" class="w-full rounded-md">
                                                <option>Pilih Platform!</option>
                                                @foreach ($platforms as $platform)
                                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('platform_id')
                                                <x-input-error :messages="$message"></x-input-error>
                                            @enderror
                                        </div>


                                        <div class="mb-4">
                                            <label for="imageUpload"
                                                class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                                            <div class="preview mt-4 mb-3" id="imagePreview">
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">No image
                                                    selected</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX.
                                                    2MB)</p>

                                            </div>
                                            <x-text-input type="text" type="file" name="image"
                                                id="imageUpload"></x-text-input>
                                            @error('image')
                                                <x-input-error :messages="$message"></x-input-error>
                                            @enderror

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


@push('addon-script')
    <script>
        const imageUpload = document.getElementById('imageUpload');
        const imagePreview = document.getElementById('imagePreview');

        imageUpload.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    imagePreview.innerHTML =
                        `<img src="${this.result}" alt="Image Preview" class="w-32 h-20 mt-2 border border-gray-300 rounded-lg">`;
                });

                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = '<p class="text-gray-500">No image selected</p>';
            }
        });
    </script>
@endpush
