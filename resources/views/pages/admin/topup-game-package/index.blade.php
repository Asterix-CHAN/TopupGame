<x-app-layout>


    <x-slot name="header">
        <div class="mx-2 md:container md:mx-auto sm:px-8 lg:px-10">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3 ">
                {{ __('Daftar Game') }}
            </h2>
        </div>
    </x-slot>

    <main>
        <!-- Begin Page Content -->
        <div class="container-fluid px-2 md:px-0 pt-10">
            <!-- Page Heading -->
            <div class="md:container mx-auto ">
                <div class="flex flex-col">
                    {{-- sm:-mx-6 lg:-mx-8 --}}
                    <div class="overflow-x-auto">
                        <div class="py-2 inline-block w-full sm:px-6 lg:px-8">

                            <div class="col-lg-12 mb-4 flex justify-end">

                                <x-secondary-button x-data=""  x-on:click.prevent="$dispatch('open-modal', 'modal-create-game')" name="">
                                    <i class="fa-solid fa-folder-plus mr-1"></i>{{ __('Tambah Game') }}
                                </x-secondary-button>

                            </div>

                            <livewire:TambahProduk />

                            <div class="overflow-x-auto shadow-md sm:rounded-lg border-collapse border border-slate-400">
                                <table class="min-w-full divide-y divide-gray-200 items-center  ">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300 ">
                                                No</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                Image</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                Developer</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                Category</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                Platform</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center ">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200  relative">
                                        @forelse ($items as $index=>$item)
                                            <tr>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                    {{ $index + 1 }}</td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                    {{ $item->name }}</td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                    <img src="{{ Storage::url($item->image) }}" alt=""
                                                        class="object-cover w-16 aspect-square rounded-lg object-center">
                                                </td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                    {{ $item->developer }}</td>
                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase border-r border-slate-300">
                                                    @forelse ($item->categories as $category)
                                                      <span class="p-[3px] bg-slate-600 rounded-md font-semibold text-white">{{ $category->name }}</span>  
                                                    @empty
                                                        <span>No category found.</span>
                                                    @endforelse
                                                </td>

                                                <td scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-slate-300">
                                                    {{ $item->platform_name ? $item->platform_name->name : 'No platform available' }}
                                                </td>

                                                <td scope="col"
                                                    class="px-6 py-3 text-xs font-medium text-gray-500 tracking-wider gap-1  ">
                                                    {{-- Edit --}}
                                                    <a href="{{ route('game-packages.edit', $item->uuid) }} " wire:navigate 
                                                        class="text-blue-600 hover:text-blue-400 items-center flex flex-row "><i
                                                            class="fa-solid fa-pen-to-square mx-1"></i>Edit
                                                    </a>
                                                    
                                                    {{-- Product --}}
                                                    <a href="{{ route('game-packages.show', $item->slug) }}" wire:navigate 
                                                        class="text-orange-500 hover:text-orange-400 flex flex-row">
                                                        <i class="fa-solid fa-warehouse mx-1"></i>Produk
                                                    </a>
                                                    
                                                    {{-- Delete --}}
                                                   <a href="{{ route('game-packages.destroy', $item->uuid) }}" 
                                                    class="text-red-600 hover:text-red-400 flex flex-row"
                                                    data-confirm-delete="true"><i
                                                        class="fa fa-trash mx-1"></i>Delete
                                                   </a>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Data Kosong</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                {{ $items->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- @push('addon-script')
    <script>
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');
    
    imageUpload.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
    
            reader.addEventListener('load', function() {
                imagePreview.innerHTML =
                    `<img src="${this.result}" alt="Image Preview" class="max-w-xs max-h-xs mt-2 border border-gray-300 rounded-lg">`;
            });
    
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = '<p class="text-gray-500">No image selected</p>';
        }
    });
</script>
    @endpush --}}

</x-app-layout>
