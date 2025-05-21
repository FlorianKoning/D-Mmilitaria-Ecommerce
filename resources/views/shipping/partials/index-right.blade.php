<section>
    <div class="mt-6 space-y-6">
        {{-- shipping city --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="city" :value="__('shipping: City')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $shipping->city)" required />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>


        {{-- shipping country --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="city" :value="__('Shipping: Country')" />
            </div>
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $shipping->country)" required />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>



        {{-- shipping postalcode --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="postal_code" :value="__('shipping: Postal Code')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', $shipping->postal_code)" required />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>


        {{-- shipping phone number --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="phone_number" :value="__('shipping: Phone Number')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $shipping->phone_number)" required />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>
    </div>
</section>
