<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">{{ ($check) ? 'Land producten overview' : 'Producten overview' }}</h1>
          <p class="mt-2 text-sm text-gray-700">Hier maakt u een nieuwe {{ ($check) ? 'land' : '' }} catagorie aan.</p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('cms.catagories.store', $check) }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf

        {{-- Catagorie name --}}
        <div>
            <x-input-label for="name" :value="($check) ? __('Land catagorie Naam.') : __('Catagorie Naam.')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- buttons --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
