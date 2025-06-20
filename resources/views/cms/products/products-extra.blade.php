<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                {{ __('Extra opties voor product: ') }}<span class="font-bolder">{{ $product->name }}</span>
            </h2>
        </div>
    </x-slot>
    {{-- products overview --}}
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-10">
            {{-- Extra images table --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <x-extra-images-table :columnNames="$imagesColumn" :images="$extraImages" :id="$product->id" />
            </div>
        </div>
    </div>


    {{-- notification --}}
    @if (session()->has('extraImageSucces'))
        <x-session-succes :sessionText="session('extraImageSucces')" :title="__('New Product')" />
    @endif

    @if (session()->has('deleteSucces'))
        <x-session-succes :sessionText="session('deleteSucces')" :title="__('Product Verwijderd')" />
    @endif

    @if (session()->has('noImage'))
        <x-session-succes :sessionText="session('noImage')" :title="__('Geen foto toegevoefd')" />
    @endif

    @if (session()->has('extraImageEdit'))
        <x-session-succes :sessionText="session('extraImageEdit')" :title="__('Product geupdate')" />
    @endif

    @if (session()->has('featureEdit'))
        <x-session-succes :sessionText="session('featureEdit')" :title="__('Feature geupdate')" />
    @endif

    @if (session()->has('productFeaturesSucces'))
        <x-session-succes :sessionText="session('productFeaturesSucces')" :title="__('Feature toegevoegd')" />
    @endif
</x-app-layout>
