@props(['active'])

@php
$classes =
    $active ?? false
        ? 'w-full inline-flex items-center text-sm px-3 py-2 leading-2 text-white bg-black rounded-lg
focus:outline-none transition'
        : 'w-full inline-flex items-center text-sm px-3 py-2 leading-5 text-gray-500 focus:outline-none
transition';
@endphp
<li class="{{ $attributes['class'] . ' ' . $classes }}">
    <a href=" {{ $attributes['href'] }}">
        {{ $slot }}
    </a>
</li>
