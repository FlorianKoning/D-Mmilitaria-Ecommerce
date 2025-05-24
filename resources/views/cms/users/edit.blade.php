<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                Gebruiker Bewerken: <span>{{ $user->first_name }} {{ $user->last_name }}</span>
            </h2>
        </div>
    </x-slot>

    {{-- users overview --}}
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-10">
            <form method="POST" action="{{ route('cms.users.update', $user->id) }}" class="mt-6 space-y-10" enctype="multipart/form-data" >
                @csrf
                @method('patch')

                {{-- user overview --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('cms.users.partials.edit')
                </div>
            </form>
        </div>
    </div>


    {{-- notification --}}
    @if (session()->has('success'))
        <x-session-succes :sessionText="session('success')" :title="__('New Product')" />
    @endif
</x-app-layout>
