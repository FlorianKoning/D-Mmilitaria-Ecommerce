<x-app-layout>
    <x-home-navbar />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Verzending informatie bewerken.') }}
                    </h2>

                    <div class="flex flex-row justify-between">
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Hier kunt u uw verzendings informatie bewerken van uw bestelling.") }}
                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-600">
                            <span>Bestellings Nummer:</span> #{{ $order->order_number }}
                        </p>
                    </div>
                </header>

                <form method="post" action="{{ route('shipping.update', [$order->id, $shipping->id]) }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div class="w-full flex flex-row max-w-full gap-10">
                        {{-- left side --}}
                        <div class="w-1/2">
                            @include('shipping.partials.index-left')
                        </div>

                        {{-- right side --}}
                        <div class="w-1/2">
                            @include('shipping.partials.index-right')
                        </div>
                    </div>

                    {{-- save button --}}
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- succesfull new order --}}
    @if (session()->has('success'))
        <x-session-succes :sessionText="session('success')" :title="__('Informatie Opgeslagen')" />
    @endif
</x-app-layout>
