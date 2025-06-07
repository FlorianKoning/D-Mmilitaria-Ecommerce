<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                {{ __('CMS Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="w-full h-full flex flex-col justify-evenly">
        {{-- Dashboard Tiles --}}
        <x-cms.dashboard.dashboard-top-tiles :orders="$orders" :customers="$customers" />

        {{-- products overview --}}
        <x-cms.dashboard.dashboard-middle-graphs :profitChart="$profitChart" />
    </div>
    

</x-app-layout>
