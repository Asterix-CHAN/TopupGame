<div class="p-6 bg-white rounded-lg shadow-lg mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Create Payment Method</h2>
        <button wire:click="$dispatch('closeModal', {component: 'create'})"
            class="text-gray-500 hover:text-red-600 text-2xl font-bold">&times;</button>
    </div>

    <!-- Form -->
    <form wire:submit.prevent="save" class="space-y-4">
        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" wire:model="name"
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter payment method name">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Payment Type</label>
            <select id="category" wire:model="category"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a Payment</option>
                <option value="credit_cart">Credit Card</option>
                <option value="gopay">E-Wallet / Qris</option>
                <option value="va">Virtual Account</option>
            </select>
            @error('category')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Cost -->
        <div>
            <label for="cost" class="block text-sm font-medium text-gray-700">Fee</label>
            <input type="number" id="fee_admin" wire:model="fee_admin"
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter cost">
            @error('cost')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" id="image" wire:model="image"
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div wire:loading wire:target="image" class="mt-3 ">
                <button type="button"
                    class="bg-blue-600 text-white font-semibold px-2 py-1 rounded flex items-center justify-center disabled:opacity-50"
                    disabled>
                    <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <path fill="#ffffff"
                            d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z" />
                    </svg>
                    Processing...
                </button>
            </div>

                <div class="mt-4">
                    @if ($temporary)
                        <img src="{{ asset('storage/' . $temporary) }}"
                            class="w-32 h-32 object-contain p-2 object-center rounded-lg shadow-md" alt="">
                    @elseif ($image)
                        <img src="{{ $image->temporaryUrl() }}"
                            class="w-32 h-32 object-contain  object-center p-2 rounded-lg shadow-md" alt="">
                    @endif
                </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                Save
            </button>
        </div>
    </form>
</div>
