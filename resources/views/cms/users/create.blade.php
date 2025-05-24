<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                {{ __('Gebruiker Toevoegen') }}
            </h2>
        </div>
    </x-slot>

    {{-- users overview --}}
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-10">
            <form method="post" action="{{ route('cms.users.store') }}" class="mt-6 space-y-10" enctype="multipart/form-data" >
                @csrf
                {{-- user overview --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('cms.users.partials.create')
                </div>
            </form>
        </div>
    </div>


    {{-- notification --}}
    @if (session()->has('success'))
        <x-session-succes :sessionText="session('success')" :title="__('New Product')" />
    @endif
</x-app-layout>
