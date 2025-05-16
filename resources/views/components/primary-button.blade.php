@props(['route' => '', 'type' => 'submit'])

@if (strlen($route) > 0)
    <a href="{{ $route }}">
        <button {{ $attributes->merge(['type' => $type, 'class' => 'inline-flex items-center px-4 py-2 bg-buttonColor border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-buttonColor/80 focus:bg-buttonColor active:bg-buttonColor focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
            {{ $slot }}
        </button>
    </a>
@else
    <button {{ $attributes->merge(['type' => $type, 'class' => 'inline-flex items-center px-4 py-2 bg-buttonColor border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-buttonColor/80 focus:bg-buttonColor active:bg-buttonColor focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif