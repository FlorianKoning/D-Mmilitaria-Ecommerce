<x-app-layout>
    {{-- products overview --}}
    <div class="flex flex-col content-start">
        <x-home-navbar />

        {{-- Item content --}}
        <div class="py-6">
            <x-item-list :products="$products" :catagories="$catagories" :latestUpdate="$latestUpdate" :landCatagories="$landCatagories" :today="$today" />
        </div>
    </div>

    @if (session()->has('wrongPermission'))
        <x-session-warning :sessionText="session('wrongPermission')" />
    @endif

    {{-- succesfull new order --}}
    @if (session()->has('bankTransfer'))
        <x-session-succes :sessionText="session('bankTransfer')" :title="__('Nieuwe Order')" />
    @endif

    {{-- error messages --}}
    @if (session()->has('error'))
        <x-session-succes :sessionText="session('error')" :title="__('Er is iets fout gegaan')" />
    @endif
</x-app-layout>
