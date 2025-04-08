<x-app-layout>
    {{-- products overview --}}
    <div class="max-w-7xl mx-auto h-svh border-t-2 border-black/80 flex flex-col content-start">
        <div class="py-12">
            @include('cart.partials.cart-index')
        </div>
    </div>

    @if (session()->has('wrongPermission'))
        <x-session-warning :sessionText="session('wrongPermission')" />
    @endif

    @if (session()->has('noItems'))
        <x-session-warning :sessionText="session('noItems')" />
    @endif

    @if (session()->has('noInventory'))
        <x-session-warning :sessionText="session('noInventory')" />
    @endif
</x-app-layout>
