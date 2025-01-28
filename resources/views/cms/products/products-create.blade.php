<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                {{ __('Product Toevoegen') }}
            </h2>
        </div>
    </x-slot>

    {{-- products overview --}}
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-10">
            <form method="post" action="{{ route('cms.products.store') }}" class="mt-6 space-y-10" enctype="multipart/form-data" >
                @csrf

                {{-- main image --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="col-span-full">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold text-gray-900">Main product foto</h1>
                            <p class="mt-2 text-sm text-gray-700">Hier upload u de fotos die overal als eerste word laten zien. Upload dus the beste foto hier.</p>
                        </div>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm/6 text-gray-600">
                                    <label for="mainImage" class="relative cursor-pointer rounded-md bg-white font-semibold text-logoBackground focus-within:outline-none focus-within:ring-2 focus-within:ring-logotext-logoBackground focus-within:ring-offset-2 hover:text-logoBackground">
                                        <span class="ml-7">Upload foto</span>
                                        <input id="mainImage" name="mainImage" type="file" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs/5 text-gray-600">PNG, JPG up to 10MB</p>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('mainImage')" />
                    </div>
                </div>

                {{-- product overview --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('cms.products.partials.products-create')
                </div>

                {{-- Korting --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
                    <header class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                          <h1 class="text-base font-semibold text-gray-900">Product korting</h1>
                          <p class="mt-2 text-sm text-gray-700">Hier kunt u instellen of u korting wilt op het product. Ook kunt u aangeven op welke dag de korting moet starten en eindigen.</p>
                        </div>
                    </header>

                    <div class="flex flex-col space-y-6">
                        <div id="saleBox" class="flex flex-col space-y-6" >
                            {{-- discount percentage --}}
                            <div id="discountPercentage">
                                <x-input-label for="discountPercentage" :value="__('Korting percentage')" />
                                <x-text-input id="discountPercentage" name="discountPercentage" type="number" min="1" step=".01" class="mt-1 block w-full" :value="old('discountPercentage')" autofocus autocomplete="discountPercentage" />
                                <x-input-error class="mt-2" :messages="$errors->get('discountPercentage')" />
                            </div>

                            {{-- discount start and end date --}}
                            <div class="flex flex-row gap-x-3">
                                {{-- start date --}}
                                <div id="discountStartDate">
                                    <x-input-label for="discountStartDate" :value="__('Korting begin datum')" />
                                    <x-text-input id="discountStartDate" name="discountStartDate" type="date" min="1" step=".01" class="mt-1 block w-full" :value="old('discountStartDate')" autofocus autocomplete="discountStartDate" />
                                    <x-input-error class="mt-2" :messages="$errors->get('discountStartDate')" />
                                </div>

                                {{-- end date --}}
                                <div id="discountEndDate">
                                    <x-input-label for="discountEndDate" :value="__('Korting eind datum')" />
                                    <x-text-input id="discountEndDate" name="discountEndDate" type="date" min="1" step=".01" class="mt-1 block w-full" :value="old('discountEndDate')" autofocus autocomplete="discountEndDate" />
                                    <x-input-error class="mt-2" :messages="$errors->get('discountEndDate')" />
                                </div>
                            </div>
                        </div>

                        {{-- buttons --}}
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
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
