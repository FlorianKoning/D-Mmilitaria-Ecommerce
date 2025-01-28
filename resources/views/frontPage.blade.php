<x-app-layout>
    {{-- products overview --}}
    <div class="w-full h-svh broder border-t-2 border-black/80 flex flex-col content-start">
        <div class="py-12">
            <x-item-list :products="$products" :catagories="$catagories" :latestUpdate="$latestUpdate" />
        </div>
    </div>

    @if (session()->has('wrongPermission'))
        <x-session-warning :sessionText="session('wrongPermission')" />
    @endif
</x-app-layout>
