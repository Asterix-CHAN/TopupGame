@props(['active' => false])

@php
$classes = $active
            ? 'text-white border-transparent ' // Add the styles for the active state
            : 'border-transparent'; // Add the styles for the inactive state
@endphp

<a {{ $attributes->merge(['class' => $classes . ' h-full relative z-10 -mb-px flex items-center border-b-4 border-spacing-y-6 font-medium transition-colors duration-300 ease-out hover:border-collapse hover:border-white hover:text-white gap-x-2 ']) }}>
    {{ $slot }}
</a>

