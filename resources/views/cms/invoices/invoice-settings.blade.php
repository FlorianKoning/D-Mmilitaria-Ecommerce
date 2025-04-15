<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                {{ __('Factuur Settings') }}
            </h2>
        </div>
    </x-slot>


    {{-- products overview --}}
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('cms.invoices.partials.invoice-settings')
            </div>
        </div>
    </div>


    @if (session()->has('updateSucces'))
        <x-session-succes :title="__('Update Gelukt!')" :sessionText="session('updateSucces')" />
    @endif
</x-app-layout>
