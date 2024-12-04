    <x-modal name="modal-create-game" focusable>
        @if (Session::has('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ Session::get('success') }}'
                });
            </script>
        @endif
        <div class=" w-full inset-0 items-center  bg-white shadow-xl rounded-lg pb-2 scroll-m-0">
            {{--  --}}
            <form method="post" wire:submit.prevent="save" class="mx-5" enctype="multipart/form-data">
                @csrf
                <div class="card mt-5">
                    <div class="card-body flex gap-2">
                        <div class="w-full">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <x-text-input type="text" wire:model="name" placeholder="Name"></x-text-input>
                                @error('name')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Developer</label>
                                <x-text-input type="text" wire:model="developer"
                                    placeholder="Developer"></x-text-input>
                                @error('developer')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                <x-text-input type="text" wire:model="description"
                                    placeholder="Description"></x-text-input>
                                @error('description')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror

                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">About</label>
                                <textarea type="text" cols="50"
                                    class="shadow appearance-none border rounded w-full px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    wire:model="about" placeholder="About"></textarea>
                                @error('about')
                                    <x-input-error :messages="$message"></x-input-error>
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
                                    <x-input-error :messages="$message"></x-input-error>
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
                                    <x-input-error :messages="$message"></x-input-error>
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
                                <x-text-input type="file" wire:model="image" id=""></x-text-input>
                                @if ($image)
                                    <img class="w-50 h-40 object-contain object-center mt-5 rounded-lg"
                                        src="{{ $image->temporaryUrl() }}">
                                @endif
                                @error('image')
                                    <x-input-error :messages="$message"></x-input-error>
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
