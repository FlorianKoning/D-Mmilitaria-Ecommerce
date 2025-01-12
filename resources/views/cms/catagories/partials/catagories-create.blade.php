<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Producten overview</h1>
          <p class="mt-2 text-sm text-gray-700">Hier heb je de overview tabel van alle producten. Hier kan je ook nieuwe producten toevoegen, editen en verwijderen.</p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('cms.catagories.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf

        {{-- product inventory number --}}
        <div>
            <x-input-label for="name" :value="__('Product inventory nummer.')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- buttons --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
