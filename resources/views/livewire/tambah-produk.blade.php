<x-modal>
    @if (session('status'))
    <script>
        Swal.fire({
            title: '{{ session('status') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

    <x-slot name="title">
        Tambah Produk
    </x-slot>

    <x-slot name="content">
        <div class=" w-full ">
            {{--  --}}
            <form wire:submit.prevent="save" >
                @csrf
                <div class="card mt-5">
                    <div class="card-body flex gap-2">
                        <div class="w-full">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <x-text-input type="text" name="name" value="{{ old('name') }} "  wire:model="name"
                                    placeholder="Name"></x-text-input>
                                @error('name')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror

                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Developer</label>
                                <x-text-input type="text" name="developer" value="{{ old('developer') }}"  wire:model="developer"
                                    placeholder="Developer"></x-text-input>
                                @error('developer')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label
                                    class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                <x-text-input type="text" name="description"
                                    value="{{ old('description') }}" wire:model="description"
                                    placeholder="Description"></x-text-input>
                                @error('description')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror

                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">About</label>
                                <textarea type="text" cols="50"
                                    class="shadow appearance-none border rounded w-full px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="about" wire:model="about" placeholder="About">{{ old('about') }}</textarea>
                                @error('about')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror

                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                                <x-text-input type="text" name="price" wire:model="price" value="{{ old('price') }}"
                                    placeholder="Price"></x-text-input>
                                @error('price')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror

                            </div>
                            <div class="mb-2">
                                <label for="category_id"
                                    class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                                <select name="category_id[]" id="category_id" wire:model="category_id" class="select2-multiple"
                                    multiple="multiple">
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
                                <select name="platform_id"  wire:model="platform_id" class="w-full rounded-md">
                                    <option disabled>Pilih Platform!</option>

                                    @foreach ($platforms as $platform)
                                        <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                    @endforeach
                                </select>
                                @error('platform_id')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Stock</label>
                                <x-text-input type="text" name="stock" wire:model="stock" value="{{ old('stock') }}"
                                    placeholder="Stock"></x-text-input>
                                @error('stock')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="imageUpload"
                                    class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                                    <div class="preview mt-4 mb-3" id="imagePreview">
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">No image selected</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX. 2MB)</p>

                                    </div>
                                <x-text-input  type="file" name="image" wire:model="image"
                                    id="imageUpload"></x-text-input>
                                @error('image')
                                    <x-input-error :messages="$message"></x-input-error>
                                @enderror

                            </div>
                        </div>
                    </div>

                </div>
                <x-primary-button>{{ __('Create') }}</x-primary-button>
            </form>
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex items-end w-full justify-end">
            <x-secondary-button wire:click="$dispatch('closeModal')" >{{ __('Close') }}</x-secondary-button>
        </div>
    </x-slot>

    
</x-modal>