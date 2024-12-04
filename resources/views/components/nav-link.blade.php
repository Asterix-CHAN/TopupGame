@props(['active' => false])

@php
$classes = $active
            ? 'text-teal-500 border-b-4 border-spacing-y-6 border-teal-500 font-semibold shadow-lg-light contrast-125 drop-shadow-xl shadow-cyan-500/50	' 
            : 'border-transparent'; 
@endphp

<a {{ $attributes->merge(['class' => $classes . ' h-full relative z-10 -mb-px flex items-center border-b-4 border-spacing-y-6 font-medium transition-colors duration-300 ease-out hover:border-collapse hover:border-teal-500 hover:text-teal-500 gap-x-2 ']) }}>
    {{ $slot }}
</a>

