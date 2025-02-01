<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Producten overview</h1>
          <p class="mt-2 text-sm text-gray-700">Hier heb je de overview tabel van alle producten. Hier kan je ook nieuwe producten toevoegen, editen en verwijderen.</p>
        </div>
    </header>

    <div class="mt-6 space-y-6">
        {{-- product inventory number --}}
        <div>
            <x-input-label for="invNumb" :value="__('Product inventory nummer.')" />
            <x-text-input id="invNumb" name="invNumb" type="text" class="mt-1 block w-full" :value="old('invNumb')" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('invNumb')" />
        </div>


        {{-- product name --}}
        <div>
            <x-input-label for="name" :value="__('Product naam.')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        {{-- small description --}}
        <div>
            <x-input-label for="smallDesc" :value="__('Kleine producten beschrijving.')" />
            <div>
                <div class="mt-2">
                    <textarea rows="4" name="smallDesc" id="smallDesc" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">{{ old('smallDesc') }}</textarea>
                </div>
                </div>
            <x-input-error class="mt-2" :messages="$errors->get('smallDesc')" />
        </div>


        {{-- big description --}}
        <div>
            <x-input-label for="bigDesc" :value="__('Grote producten beschrijving.')" />
            <div>
                <div class="mt-2">
                    <textarea rows="4" name="bigDesc" id="bigDesc" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">{{ old('bigDesc') }}</textarea>
                </div>
                </div>
            <x-input-error class="mt-2" :messages="$errors->get('bigDesc')" />
        </div>


        {{-- product inventory --}}
        <div>
            <x-input-label for="inventory" :value="__('Product kwantiteit.')" />
            <x-text-input id="inventory" name="inventory" type="number" min="1" class="mt-1 block w-full" :value="old('inventory')" required autofocus autocomplete="inventory" />
            <x-input-error class="mt-2" :messages="$errors->get('inventory')" />
        </div>


        {{-- product price --}}
        <div>
            <x-input-label for="price" :value="__('Product price.')" />
            <x-text-input id="price" name="price" type="number" min="1" step=".01" class="mt-1 block w-full" :value="old('price')" required autofocus autocomplete="price" />
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>
    </div>
</section>
