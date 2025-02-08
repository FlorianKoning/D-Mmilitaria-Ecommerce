<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                {{ __('product Catagorie Linken: ').$productName }}
            </h2>
        </div>
    </x-slot>

    {{-- products overview --}}
    <div class="py-12 space-y-10">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('cms.products.partials.products-categories-product')
            </div>
        </div>
    </div>
</x-app-layout>
