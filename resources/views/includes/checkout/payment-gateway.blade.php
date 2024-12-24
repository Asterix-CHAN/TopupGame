
<div x-data="{ selectedAccordionItem: 'one' }"
    class="w-full  overflow-hidden rounded-md   bg-neutral-50/40 text-neutral-600 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900/50 dark:text-neutral-300">
    {{-- Gopay --}}
    <div class="divide-y divide-neutral-300 dark:divide-neutral-700">
        <button id="controlsAccordionItemOne" type="button"
            class="flex w-full items-center justify-between gap-4 bg-neutral-50 p-4 text-left underline-offset-2 hover:bg-neutral-50/75 focus-visible:bg-neutral-50/75 focus-visible:underline focus-visible:outline-none dark:bg-neutral-900 dark:hover:bg-neutral-900/75 dark:focus-visible:bg-neutral-900/75"
            aria-controls="accordionItemOne" @click="selectedAccordionItem = 'one'"
            :class="selectedAccordionItem === 'one' ? 'text-onSurfaceStrong dark:text-onSurfaceDarkStrong font-bold' :
                'text-onSurface dark:text-onSurfaceDark font-medium'"
            :aria-expanded="selectedAccordionItem === 'one' ? 'true' : 'false'">
            Gopay
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true"
                :class="selectedAccordionItem === 'one' ? 'rotate-180' : ''">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        <div x-cloak x-show="selectedAccordionItem === 'one'" id="accordionItemOne" role="region"
            aria-labelledby="controlsAccordionItemOne" x-collapse>
            @foreach ($payments as $payment)
                @if ($payment->category === 'gopay')
                    <div class="p-4 text-sm sm:text-base">
                        <!-- Radio Button -->
                        <input type="radio" class="peer hidden" id="pay{{ $payment->id }}" name="channel"
                            value="{{ $payment->category }}" @change="selected = true" >
                        <label for="pay{{ $payment->id }}"
                            class="p-3 mb-0 flex items-center border border-black rounded-lg transition-all duration-300 ease-in-out hover:shadow-md peer-checked:border-green-500 peer-checked:shadow-lg peer-checked:bg-teal-50 cursor-pointer">
                            <!-- Image -->
                            <div class="symbol w-12 h-12 overflow-hidden mr-3 flex items-center">
                                <img src="{{ asset('storage/' . $payment->image) }}"
                                    class="w-full h-auto object-contain object-center" alt="Logo {{ $payment->name }}">
                            </div>
                            <!-- Payment Name -->
                            <div class="text-start flex flex-col">
                                <span class="font-bold text-neutral-800 dark:text-neutral-200 text-sm uppercase">
                                    {{ $payment->name }}
                                </span>
                                <span class="font-bold text-neutral-800 dark:text-neutral-200 text-sm" >Rp.
                                    {{ number_format($payment->fee_admin, 0, ',', '.') }}
                                </span>
                            </div>
                        </label>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    {{-- Virtual Account --}}
    <div class="divide-y divide-neutral-300 dark:divide-neutral-700">
        <button id="controlsAccordionItemTwo" type="button"
            class="flex w-full items-center justify-between gap-4 bg-neutral-50 p-4 text-left underline-offset-2 hover:bg-neutral-50/75 focus-visible:bg-neutral-50/75 focus-visible:underline focus-visible:outline-none dark:bg-neutral-900 dark:hover:bg-neutral-900/75 dark:focus-visible:bg-neutral-900/75"
            aria-controls="accordionItemTwo" @click="selectedAccordionItem = 'two'"
            :class="selectedAccordionItem === 'two' ? 'text-onSurfaceStrong dark:text-onSurfaceDarkStrong font-bold' :
                'text-onSurface dark:text-onSurfaceDark font-medium'"
            :aria-expanded="selectedAccordionItem === 'two' ? 'true' : 'false'">
            Virtual Account
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true"
                :class="selectedAccordionItem === 'two' ? 'rotate-180' : ''">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        <div x-cloak x-show="selectedAccordionItem === 'two'" id="accordionItemTwo" role="region"
            aria-labelledby="controlsAccordionItemTwo" x-collapse>
            @foreach ($payments as $payment)
                @if ($payment->category === 'va')
                    <div class="p-4 text-sm sm:text-base">
                        <!-- Radio Button -->
                        <input type="radio" class="peer hidden" id="pay{{ $payment->id }}" name="channel"
                            value="{{ $payment->slug }}_va" @change="selected = true" >
                        <label for="pay{{ $payment->id }}"
                            class="p-3 mb-0 flex items-center border border-black rounded-lg transition-all duration-300 ease-in-out hover:shadow-md peer-checked:border-green-500 peer-checked:shadow-lg peer-checked:bg-teal-50 cursor-pointer">
                            <!-- Image -->
                            <div class="symbol w-12 h-12 overflow-hidden mr-3 flex items-center">
                                <img src="{{ asset('storage/' . $payment->image) }}"
                                    class="w-full h-auto object-contain object-center "
                                    alt="Logo {{ $payment->name }}">
                            </div>
                            <!-- Payment Name -->
                            <div class="text-start flex flex-col">
                                <span class="font-bold text-neutral-800 dark:text-neutral-200 text-sm uppercase">
                                    {{ $payment->name }}
                                </span>
                                <span class="font-bold text-neutral-800 dark:text-neutral-200 text-sm">Rp.
                                    {{ number_format($payment->fee_admin, 0, ',', '.') }}
                                </span>
                            </div>
                        </label>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="divide-y divide-neutral-300 dark:divide-neutral-700">
        <button id="controlsAccordionItemThree" type="button"
            class="flex w-full items-center justify-between gap-4 bg-neutral-50 p-4 text-left underline-offset-2 hover:bg-neutral-50/75 focus-visible:bg-neutral-50/75 focus-visible:underline focus-visible:outline-none dark:bg-neutral-900 dark:hover:bg-neutral-900/75 dark:focus-visible:bg-neutral-900/75"
            aria-controls="accordionItemThree" @click="selectedAccordionItem = 'three'"
            :class="selectedAccordionItem === 'three' ? 'text-onSurfaceStrong dark:text-onSurfaceDarkStrong font-bold' :
                'text-onSurface dark:text-onSurfaceDark font-medium'"
            :aria-expanded="selectedAccordionItem === 'three' ? 'true' : 'false'">
            What is the refund policy?
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true"
                :class="selectedAccordionItem === 'three' ? 'rotate-180' : ''">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        <div x-cloak x-show="selectedAccordionItem === 'three'" id="accordionItemThree" role="region"
            aria-labelledby="controlsAccordionItemThree" x-collapse>
            <div class="p-4 text-sm sm:text-base text-pretty">
                Please refer to our <a href="#"
                    class="underline underline-offset-2 text-black dark:text-white">refund policy page</a> on the
                website for detailed information regarding eligibility, timeframes, and the process for requesting a
                refund.
            </div>
        </div>
    </div>
</div>
