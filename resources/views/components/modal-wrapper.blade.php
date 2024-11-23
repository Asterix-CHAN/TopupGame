<div class="relative z-40" x-data="{ show : @entangle($attributes->wire('model')) }" x-show="visible"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">>
    <div  class="fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40">
        <div  class="fixed inset-0 transform">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div  class="bg-white rounded-lg overflow-hidden transform sm:w-full sm:mx-auto max-w-3xl">
            {{ $slot }}
        </div>

    </div>

</div>





