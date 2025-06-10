<x-app-layout>
    {{-- products overview --}}
    <div class="max-w-full h-fit mx-auto flex flex-col content-start">
        <x-home-navbar />

        <div class="py-6">
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
