<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('gallery.edit', $galeri) }}
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3 ml-4">
            {{ __('Edit Image') }}
        </h2>
    </x-slot>


    <main>
        <div class="main-wrapper flex flex-col mb-5">
            <div class="main-content flex">
                <div class="container w-1/2">

                    @if (Session::has('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: '{{ Session::get('success') }}'
                            });
                        </script>
                    @endif

                    <form method="post" action="{{ route('gallery.update', $galeri->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card mt-5">
                            <div class="card-body flex gap-2">
                                <div class="w-full">
                                    <div class="mb-4">
                                        <select
                                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            name="topupgame_packages_id" required id="grid-state" disabled>
                                            @forelse ($games as $game)
                                                <option value="{{ $game->id }}"
                                                    {{ $galeri->topupgame_packages_id === $game->id ? 'selected' : '' }}>
                                                    {{ $game->name }}</option>
                                            @empty
                                                <span>Data Kosong!</span>
                                            @endforelse
                                        </select>
                                        @error('topupgame_packages_id')
                                            <x-input-error :messages="$message"></x-input-error>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="bg-white p-6 rounded-lg shadow-lg">
                                            <h1 class="text-2xl font-semibold mb-4">Upload an Image</h1>
                                            <div class="preview mt-4 mb-3" id="imagePreview">
                                                @if ($galeri->image)
                                                    <div>
                                                        <img src="{{ Storage::url($galeri->image) }}" alt="Current Image"
                                                            class="max-w-xs max-h-xs rounded-lg shadow-lg border border-collapse ">
                                                    </div>
                                                @endif
                                            </div>
                                            <x-text-input type="file" id="imageLoad" name="image" class="block"></x-text-input>
                                            
                                            @error('image')
                                                <x-input-error :messages="$message"></x-input-error>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer flex justify-end mt-2">
                                <x-primary-button>{{ __('Ubah') }}</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </main>

   
    @push('addon-script')
<script>
    const imageUpload = document.getElementById('imageLoad'); // Sesuaikan id-nya (case sensitive)
    const imagePreview = document.getElementById('imagePreview');

    imageUpload.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                const result = reader.result;
                imagePreview.innerHTML = `<img src="${result}" alt="Current Image" class="max-w-xs max-h-xs rounded-lg shadow-lg border border-collapse ">`;
            });

            reader.readAsDataURL(file);
        }
    });
</script>
@endpush

</x-app-layout>
