<section>
    <div class="mt-6 space-y-6">
        {{-- shipping city --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="city" :value="__('Verzending: Stad')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $shipping->city)" required />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>  


        {{-- netherlands provinces --}}
        <div>
            <label for="province_id" class="block text-sm/6 font-medium text-gray-700">Verzending: Stad <span class="text-red-500">*</span></label>
            <div class="mt-2 grid grid-cols-1">
              <select required id="provinces" name="province_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
                @foreach ($provinces as $province)
                    <option {{ ($shipping != null && $province->id == $shipping->province_id) ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->province_name }}</option>
                @endforeach
              </select>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('province_id')" />
        </div>


        {{-- shipping postalcode --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="postal_code" :value="__('Verzending: Post Code')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', $shipping->postal_code)" required />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>


        {{-- shipping phone number --}}
        <div>
            <div class="flex flex-row gap-1">
                <x-input-label for="phone_number" :value="__('Verzending: Telefoon Nummer')" />
                <p class="text-red-600">*</p>
            </div>
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $shipping->phone_number)" required />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>
    </div>
</section>
