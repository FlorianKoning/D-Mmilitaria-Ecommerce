<section>
    <div class="mt-6 space-y-6">
        {{-- shipping first name --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="first_name" :value="__('Verzending: Voor Naam')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $shipping->first_name)" required />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        {{-- shipping last name --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="last_name" :value="__('Verzending: Achter Naam')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $shipping->last_name)" required />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        {{-- shipping company --}}
        <div>
            <x-input-label for="company" :value="__('Verzending: Bedrijf')" />
            <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" :value="old('company', $shipping->company)" />
            <x-input-error class="mt-2" :messages="$errors->get('company')" />
        </div>

        {{-- shipping address --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="address" :value="__('Verzending: Address')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $shipping->address)" required />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
    </div>
</section>
