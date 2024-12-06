    <x-modal name="modal-create-game" focusable>
        <div class=" w-full inset-0 items-center  bg-white shadow-xl rounded-lg pb-2 scroll-m-0">
            {{--  --}}
            <form method="post" wire:submit.prevent="save" class="mx-5" enctype="multipart/form-data">
                @csrf
                <div class="card mt-5">
                    <div class="card-body flex gap-2">
                        <div class="w-full">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <x-text-input type="text" wire:model="name" placeholder="Name" />
                                @error('name')
                                    <x-input-error :messages="$message" />
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Developer</label>
                                <x-text-input type="text" wire:model="developer" placeholder="Developer" />
                                @error('developer')
                                    <x-input-error :messages="$message" />
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                <x-text-input type="text" wire:model="description" placeholder="Description" />
                                @error('description')
                                    <x-input-error :messages="$message" />
                                @enderror

                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">About</label>
                                <textarea type="text" cols="50"
                                    class="shadow appearance-none border rounded w-full px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    wire:model="about" placeholder="About"></textarea>
                                @error('about')
                                    <x-input-error :messages="$message" />
                                @enderror
                            </div>

                            <div class="mb-2" wire:ignore>
                                <label for="category_id"
                                    class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                                <select wire:model="category_id" multiple id="category_id"
                                    class="select2-multiple w-full px-10">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <x-input-error :messages="$message" />
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="platforms"
                                    class="block text-gray-700 text-sm font-bold mb-2">Platform</label>
                                <select wire:model="platform_id" class="w-full rounded-md">
                                    <option>Pilih Platform!</option>
                                    @foreach ($platforms as $platform)
                                        <option value="{{ $platform->id }}">
                                            {{ $platform->name }}</option>
                                    @endforeach
                                </select>
                                @error('platform_id')
                                    <x-input-error :messages="$message" />
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="imageUpload"
                                    class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                                <div class="preview mt-4 mb-3" id="imagePreview">
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        No image
                                        selected</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG,
                                        JPG, JPEG (MAX.
                                        2MB)</p>

                                </div>
                                <x-text-input type="file" wire:model="image" id="image" />
                                <div wire:loading wire:target="image" class="mt-3 ">
                                    <button type="button"
                                        class="bg-indigo-500 text-white font-semibold px-2 py-1 rounded flex items-center justify-center disabled:opacity-50"
                                        disabled>
                                        <svg class="animate-spin h-5 w-5 mr-2 text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="#ffffff"
                                                d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z" />
                                        </svg>
                                        Processing...
                                    </button>
                                </div>

                                @if ($image)
                                    <img class="w-50 h-40 object-contain object-center mt-5 rounded-lg"
                                        src="{{ $image->temporaryUrl() }}">
                                @endif


                                @error('image')
                                    <x-input-error :messages="$message" />
                                @enderror

                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-6 flex justify-end">

                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3">
                        {{ __('Simpan') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        @script()
            <script>
                $(document).ready(function() {
                    $('.select2-multiple').select2({
                        placeholder: "Select",
                        multiple: true,
                        tags: true,
                        allowClear: true
                    });
                    $('.select2-multiple').on('change', function() {
                        let data = $(this).val();
                        // $wire.set('category_id', data, false);
                        $wire.category_id = data;

                    });
                });
            </script>
        @endscript
    </x-modal>
