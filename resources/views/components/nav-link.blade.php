@props(['active'])

@php
$classes =
    $active ?? false
        ? 'w-full inline-flex items-center text-sm py-2 leading-2 text-white rounded-lg
focus:outline-none transition'
        : 'w-full inline-flex items-center text-sm py-2 leading-5 text-gray-500 focus:outline-none
transition';
@endphp
<li class="{{ $attributes['class'] . ' ' . $classes }}">
    <a href=" {{ $attributes['href'] }}"
        class="{{ $active ? 'bg-blue-500 p-1 rounded-xl' : '' }}">
        {{ $slot }}
    </a>
</li>
