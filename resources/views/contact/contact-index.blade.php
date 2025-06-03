<x-app-layout>
    <x-home-navbar />

    <div class="py-12 w-fit">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    @include('contact.partials.contact-index')
                </div>
            </div>
        </div>
    </div>

    {{-- succesfull new order --}}
    @if (session()->has('success'))
        <x-session-succes :sessionText="session('success')" :title="__('Bericht Verstuurd')" />
    @endif
</x-app-layout>
