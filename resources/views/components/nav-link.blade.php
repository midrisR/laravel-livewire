@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center border-l-2 border-indigo-700 text-sm font-semibold leading-5 text-indigo-700
focus:outline-none focus:border-indigo-700 transition'
: 'inline-flex items-center border-l-4 border-transparent text-sm font-medium leading-5 text-indigo-500
hover:text-indigo-700 hover:border-indigo-300 focus:outline-none focus:text-indigo-700 focus:border-indigo-300
transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>