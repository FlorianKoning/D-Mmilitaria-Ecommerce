@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex flex-row justify-between gap-x-3 p-2 text-sm font-semibold text-white hover:text-white bg-logoBackground rounded'
            : 'group flex flex-row justify-between gap-x-3 p-2 text-sm font-semibold text-black hover:text-white hover:bg-logoBackground rounded';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>

