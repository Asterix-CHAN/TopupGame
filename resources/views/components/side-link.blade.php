@props(['active'])

@php
$classes = ($active ?? false)
           ? 'text-sm font-medium text-gray-700 py-2 px-2 bg-teal-500 text-white text-base rounded-md shadow-xl'
            : 'text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out hover:shadow-xl hover:shadow-teal-500/50';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
