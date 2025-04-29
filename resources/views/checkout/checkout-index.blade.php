<x-app-layout>
    <div class="w-full h-svh broder border-t-2 border-black/80 flex flex-col content-start">
        <div class="py-12">
            @include('checkout.partials.checkout-index')
        </div>
    </div>

    @if (session()->has('duplicateOrder'))
        <x-session-warning :sessionText="session('duplicateOrder')" />
    @endif

    @if (session()->has('erorr'))
        <x-session-warning :sessionText="session('error')" />
    @endif
</x-app-layout>
