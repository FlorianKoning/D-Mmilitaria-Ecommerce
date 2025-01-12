<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Catagorie Update</h1>
          <p class="mt-2 text-sm text-gray-700">Hier kunt u heel simpel de catagorie updaten door gewoon de form hier onder in te vullen.</p>
        </div>
    </header>


    <form method="post" action="{{ route('cms.catagories.update', $catagorie->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf

        {{-- product inventory number --}}
        <div>
            <x-input-label for="name" :value="__('Catagorie Naam')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $catagorie->name)" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- buttons --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
