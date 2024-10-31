<div
class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
<div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 my-auto">
    <div class=" w-full">

        <form method="post" action="{{ route('platform.store') }}">
            @csrf
            <div class="card">
                <div class="card-body flex gap-2">
                    <div class="w-full">

                        <div class="mb-4">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2">Platform</label>
                            <x-text-input type="text" name="name"
                                value="{{ old('name') }}"
                                placeholder="Platform"></x-text-input>
                            @error('name')
                                <x-input-error
                                    :messages="$message"></x-input-error>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
    </div>
</div>
<div
    class="mt-6 flex bg-gray-50 px-4 py-3 sm:flex sm:flex-row gap-2 justify-end sm:px-6">
    <x-secondary-button x-on:click="$dispatch('close')">
        {{ __('Cancel') }}
    </x-secondary-button>

    <x-primary-button class="ms-3">
        {{ __('Simpan') }}
    </x-primary-button>
</div>
</form>

</div>