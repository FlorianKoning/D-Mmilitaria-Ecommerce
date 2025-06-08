<x-app-layout>
    <div class="w-full ">
        <x-slot name="header">
            <div class="flex justify-around">
                <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                    {{ __('CMS Dashboard') }}
                </h2>
            </div>
        </x-slot>

        <div class="flex flex-col justify-evenly h-screen">
            <div class="w-full h-1/3">
                {{-- Dashboard Tiles --}}
                <x-cms.dashboard.dashboard-top-tiles :orders="$orders" :customers="$customers" />
            </div>
            
            <div class="w-full h-2/3">
                {{-- products overview --}}
                <x-cms.dashboard.dashboard-middle-graphs :profitChart="$profitChart" :dateOptions="$dateOptions" :exportOptions="$exportOptions" />
            </div>
        </div>
    </div>
</x-app-layout>
