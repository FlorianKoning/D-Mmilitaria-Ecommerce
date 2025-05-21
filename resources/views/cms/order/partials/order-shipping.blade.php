<section>
    <div>
        <div class="border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Verzending informatie</h2>
            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                {{-- user first name --}}
                <div>
                    <label for="first-name" class="block text-sm/6 font-medium text-gray-700">Voornaam</label>
                    <x-text-input disabled id="first-name" name="first-name" type="text" class="mt-2 block w-full" :value="(isset($shipping->first_name)) ? $shipping->first_name : old('first-name')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('first-name')" />
                </div>

                {{-- user last name --}}
                <div>
                    <label for="last-name" class="block text-sm/6 font-medium text-gray-700">Achternaam</label>
                    <x-text-input disabled id="last-name" name="last-name" type="text" class="mt-2 block w-full" :value="(isset($shipping->last_name)) ? $shipping->last_name : old('last-name')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('last-name')" />
                </div>

                {{-- user company name --}}
                <div class="sm:col-span-2">
                    <label for="company" class="block text-sm/6 font-medium text-gray-700">Bedrijf</label>
                    <x-text-input disabled id="company" name="company" type="text" class="mt-2 block w-full" :value="(isset($shipping->company)) ? $shipping->company : old('company')" />
                    <x-input-error class="mt-2" :messages="$errors->get('company')" />
                </div>

                {{-- user address --}}
                <div class="sm:col-span-2">
                    <label for="address" class="block text-sm/6 font-medium text-gray-700">Address</label>
                    <x-text-input disabled id="address" name="address" type="text" class="mt-2 block w-full" :value="(isset($shipping->address)) ? $shipping->address : old('address')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>

                {{-- user apartment --}}
                <div class="sm:col-span-2">
                    <label for="apartment" class="block text-sm/6 font-medium text-gray-700">Apartment, suite, etc.</label>
                    <x-text-input disabled id="apartment" name="apartment" type="text" class="mt-2 block w-full" :value="(isset($shipping->apartment)) ? $shipping->apartment : old('apartment')" />
                    <x-input-error class="mt-2" :messages="$errors->get('apartment')" />
                </div>

                {{-- user city --}}
                <div>
                    <label for="city" class="block text-sm/6 font-medium text-gray-700">Stad</label>
                    <x-text-input disabled id="city" name="city" type="text" class="mt-2 block w-full" :value="(isset($shipping->city)) ? $shipping->city : old('city')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('city')" />
                </div>

                {{-- shipping country --}}
                <div>
                    <label for="country" class="block text-sm/6 font-medium text-gray-700">Land</label>
                    <x-text-input disabled id="country" name="country" type="text" class="mt-2 block w-full" :value="(isset($shipping->country)) ? $shipping->country : old('country')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('country')" />
                </div>

                {{-- postal code --}}
                <div>
                    <label for="postal-code" class="block text-sm/6 font-medium text-gray-700">Post code</label>
                    <x-text-input disabled id="postal-code" name="postal-code" type="text" class="mt-2 block w-full" :value="(isset($shipping->postal_code)) ? $shipping->postal_code : old('postal-code')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('postal-code')" />
                </div>

                {{-- phone number --}}
                <div class="sm:col-span-2">
                    <label for="phone" class="block text-sm/6 font-medium text-gray-700">Telefoon nummer</label>
                    <x-text-input disabled id="phone" name="phone" type="text" class="mt-2 block w-full" :value="(isset($shipping->phone_number)) ? $shipping->phone_number : old('phone')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>

                <div class="flex items-center gap-4">
                <x-redirect-button :route="route('cms.orders.index')" :name="__('Terug')" />
            </div>
        </div>
    </div>
</section>
