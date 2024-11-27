<div class="p-6 bg-white rounded-lg shadow-lg mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Create Payment Method</h2>
        <button wire:click="$dispatch('closeModal', {component: 'method-payment'})" 
                class="text-gray-500 hover:text-red-600 text-2xl font-bold">&times;</button>
    </div>

    <!-- Form -->
    <form wire:submit.prevent="save" class="space-y-4">
        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input 
                type="text" 
                id="name" 
                wire:model="name" 
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter payment method name">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Cost -->
        <div>
            <label for="cost" class="block text-sm font-medium text-gray-700">Cost</label>
            <input 
                type="number" 
                id="cost" 
                wire:model="cost" 
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter cost">
            @error('cost') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input 
                type="file" 
                id="image" 
                wire:model="image" 
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <!-- Preview -->
            @if ($image)
            <div class="mt-4">
                <img src="{{ $image->temporaryUrl() }}" class="w-32 h-32 object-cover rounded-lg shadow-md" alt="Preview">
            </div>
            @endif
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

  
