<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-40" aria-hidden="true"></div>

    <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 my-auto">
                    <div class=" w-full">
                      
                        <form method="post" action="{{ route('platform.store') }}" >
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

                            <div class="card">
                                <div class="card-body flex gap-2">
                                    <div class="w-full">
                                        
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2">Platform</label>
                                                <x-text-input type="text"
                                                    name="name" value="{{ old('name') }}" placeholder="Platform"></x-text-input>
                                                    @error('name')
                                                    <x-input-error :messages="$message"></x-input-error>
                                                     @enderror
                                            </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row gap-2 justify-end sm:px-6">
                    <x-primary-button type="submit"
                       >Create</x-primary-button>
                    </form>
                    <x-secondary-button 
                        @click="isOpen = !isOpen">Cancel</x-secondary-button>
                </div>

               
            </div>
        </div>
    </div>
</div>


