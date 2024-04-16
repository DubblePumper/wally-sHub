@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-yellow-400 text-start text-base font-medium text-yellow-700 bg-yellow-50 focus:outline-none focus:text-yellow-800 focus:bg-yellow-100 focus:border-yellow-700 transition duration-150 ease-in-out'
    : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-white hover:text-gray-300 hover:bg-gray-700 hover:border-gray-600 focus:outline-none focus:text-gray-300 focus:bg-gray-700 focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
