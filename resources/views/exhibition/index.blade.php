<x-app-layout>
    <x-home-navbar />

    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:py-6 lg:py-8 sm:rounded-lg">
                <div class="max-w-full">
                    @include('exhibition.partials.index')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
