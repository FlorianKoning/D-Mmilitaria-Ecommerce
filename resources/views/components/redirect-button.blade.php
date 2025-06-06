@props(['route', 'name'])

<a href="{{ $route }}">
    <button type="button" class="block rounded-md bg-logoBackground px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-logoBackground/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#3C8DBC]">{{ $name }}</button>
</a>
