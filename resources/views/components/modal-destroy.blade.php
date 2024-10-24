<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" 
>

    <!-- Trigger for Modal -->
    <div @click="showModal = true">{{ $trigger }}</div>
    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50 transform transition-all"
        x-show="showModal"     
        >

        <!-- Modal inner -->
        <div class="max-w-3xl  px-6 py-4 mx-auto text-left bg-white rounded shadow-lg transform transition-all" @click.away="showModal = false"
            x-transition:enter="transition ease-out duration-200" 
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" 
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 
            scale-100" x-transition:leave-end="opacity-0 scale-95">
        <div class="flex justify-between items-start p-4 border-b dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                {{ $title ?? '' }}
            </h3>
        </div>


            <!-- content -->
            <div class="min-w-[200px] min-h-[100px] flex px-2 items-center justify-center">
                <p class="text-gray-700">
                    {{ $content }}
                </p>
            </div>
            <!-- Title / Close-->

            <div class="flex  items-center justify-end gap-2">
                <div>
                    {{ $submit }}
                </div>
                <div class="z-50 cursor-pointer" @click="showModal = false">{{ $cancel }}
                </div>
            </div>
        </div>
    </div>
</div>
