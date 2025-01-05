@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex gap-x-3 bg-cmsNavHover p-2 text-sm/6 font-semibold text-white border-l-2'
            : 'group flex gap-x-3 p-2 text-sm/6 font-semibold text-white hover:bg-cmsNavHover hover:text-white hover:border-l-2';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>

