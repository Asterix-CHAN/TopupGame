<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    <!-- Trigger for Modal -->
    <div  @click="showModal = true">{{ $trigger }}</div>
    <!-- Modal -->
    <div
        class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50 "
        x-show="showModal"
    >
        <!-- Modal inner -->
        <div 
            class="max-w-3xl  px-6 py-4 mx-auto text-left bg-white rounded shadow-lg"
            @click.away="showModal = false"
            x-transition:enter="motion-safe:ease-out duration-300" 
            x-transition:enter-start="opacity-0 scale-90" 
            x-transition:enter-end="opacity-100 scale-100"
        >
            <!-- content -->
            <div class="min-w-[200px] min-h-[100px] flex px-2 items-center justify-center">
                <p class="text-gray-700">
                    {{ $content }}
                </p>
            </div>
             <!-- Title / Close-->
            
             <div class="flex  items-center justify-end gap-2">
                <div >
                    {{ $submit }}
                </div>
                <div class="z-50 cursor-pointer" @click="showModal = false">{{ $cancel }}
                </div>
            </div>
        </div>
    </div>
</div>