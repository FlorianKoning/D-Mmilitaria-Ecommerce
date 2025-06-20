<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('shipping') }}
        </h2>
    </x-slot>

    {{-- profile navbar --}}
    <x-profile-navbar />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    @include('profile.partials.shipping-info')
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('shippingSucces'))
        <x-session-succes :sessionText="session('shippingSucces')" :title="__('Success!')" />
    @endif
</x-app-layout>
