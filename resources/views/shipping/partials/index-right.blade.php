<section>
    <div class="mt-6 space-y-6">
        {{-- shipping city --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="city" :value="__('City')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $shipping->city)" required />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>


        {{-- shipping country --}}
        <div class="sm:col-span-2">
            <label for="shippingCountry" class="block text-sm font-medium text-gray-700">Country</label>
            <div class="grid grid-cols-1">
                    <select id="shippingCountry" name="shippingCountry" class="mt-1 block w-full rounded-md bg-[#F3F5F7] border-[#F3F5F7]/80 px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
                        @foreach ($countries as $country)
                            <option {{ ($shipping->shippingCountry_id == $country->id) ? "selected" : null }} value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shippingCountry')" />
        </div>


        {{-- shipping postalcode --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="postal_code" :value="__('Postal Code')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', $shipping->postal_code)" required />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>


        {{-- shipping phone number --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $shipping->phone_number)" required />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>
    </div>
</section>
