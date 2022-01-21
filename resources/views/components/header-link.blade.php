@props(['active'])

@php
$classes = $active ?? false ? 'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium' : 'text-white px-3 py-2 rounded-md text-sm font-medium';
@endphp
<a class="{{ $attributes['class'] . ' ' . $classes }}"
    href=" {{ $attributes['href'] }}">
    {{ $slot }}
</a>
