<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                {{ __('Klanten overzicht') }}
            </h2>
        </div>
    </x-slot>


    {{-- products overview --}}
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('cms.users.partials.index')
            </div>
        </div>
    </div>

     {{-- notification --}}
    @if (session()->has('success'))
        <x-session-succes :sessionText="session('success')" :title="__('New Product')" />
    @endif
</x-app-layout>
