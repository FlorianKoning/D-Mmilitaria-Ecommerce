<x-app-layout>
    {{-- products overview --}}
    <div class="w-full h-svh broder border-t-2 border-black/80 flex flex-col content-start">
        <div class="py-12">
            @include('cart.partials.cart-index')
        </div>
    </div>

    @if (session()->has('wrongPermission'))
        <x-session-warning :sessionText="session('wrongPermission')" />
    @endif


</x-app-layout>
