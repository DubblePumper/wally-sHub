@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full py-1.5 text-white bg-gray-300/10 border border-2 border-gray-700 rounded-lg md:w-80 placeholder-gray-400/70 focus:outline-none']) !!}>