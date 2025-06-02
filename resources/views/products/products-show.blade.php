<x-app-layout>
    

    {{-- products overview --}}
    <div class="w-full broder border-t-2 border-black/80 flex flex-col content-start">
        <x-home-navbar />   

        <div class="py-12">
            @include('products.partials.products-show')
        </div>
    </div>

    @if (session()->has('wrongPermission'))
        <x-session-warning :sessionText="session('wrongPermission')" />
    @endif

    @if (session()->has('productAdded'))
        <x-session-succes :sessionText="session('productAdded')" :title="__('Product Toegevoegd.')" />
    @endif


    @if (session()->has('productNotAdded'))
        <x-session-succes :sessionText="session('productNotAdded')" :title="__('Product niet toegevoegd.')" />
    @endif

</x-app-layout>
