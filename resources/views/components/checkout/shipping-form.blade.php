@props(['shipping', 'provinces'])
<div>
    <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

    <div class="mt-4 space-y-6">
        <div class="sm:col-span-2">
            <label for="email-address" class="block text-sm/6 font-medium text-gray-700">Email address <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="email" id="email-address" name="shipping[email-address]" value="{{ (Auth::check()) ? Auth::user()->email : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.email-address')" />
        </div>
        <div class="sm:col-span-2">
            <label for="phone" class="block text-sm/6 font-medium text-gray-700">Telefoon nummer <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[phone]" id="phone" value="{{ ($shipping != null) ? $shipping->phone_number : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.phone')" />
        </div>
    </div>
    </div>

    <div class="mt-10 border-t border-gray-200 pt-10">
    <h2 class="text-lg font-medium text-gray-900">Verzendings informatie</h2>

    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
        <div>
            <label for="first-name" class="block text-sm/6 font-medium text-gray-700">Voornaam <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" id="first-name" name="shipping[first-name]" value="{{ ($shipping != null) ? $shipping->first_name : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.first-name')" />
        </div>

        <div>
            <label for="last-name" class="block text-sm/6 font-medium text-gray-700">Achternaam <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" id="last-name" name="shipping[last-name]" value="{{ ($shipping != null) ? $shipping->last_name : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.last-name')" />
        </div>

        <div class="sm:col-span-2">
            <label for="company" class="block text-sm/6 font-medium text-gray-700">Bedrijf</label>
            <div class="mt-2">
                <input type="text" name="shipping[company]" id="company" value="{{ ($shipping != null) ? $shipping->company : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.company')" />
        </div>

        <div class="sm:col-span-2">
            <label for="address" class="block text-sm/6 font-medium text-gray-700">Address <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[address]" id="address" value="{{ ($shipping != null) ? $shipping->address : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.address')" />

        </div>

        <div class="sm:col-span-2">
            <label for="apartment" class="block text-sm/6 font-medium text-gray-700">Apartement</label>
            <div class="mt-2">
                <input type="text" name="shipping[apartment]" id="apartment" value="{{ ($shipping != null) ? $shipping->apartment : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.apartment')" />
        </div>

        <div>
            <label for="city" class="block text-sm/6 font-medium text-gray-700">Stad <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[city]" id="city" value="{{ ($shipping != null) ? $shipping->city : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.city')" />
        </div>

        {{-- netherlands provinces --}}
        <div>
            <label for="provinces" class="block text-sm/6 font-medium text-gray-700">Provincies <span class="text-red-500">*</span></label>
            <div class="mt-2 grid grid-cols-1">
              <select required id="provinces" name="shipping[provinces]" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
                @foreach ($provinces as $province)
                    <option {{ ($shipping != null && $province->id == $shipping->province_id) ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->province_name }}</option>
                @endforeach
              </select>
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.provinces')" />
        </div>

        <div>
            <label for="postal-code" class="block text-sm/6 font-medium text-gray-700">Post code <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[postal-code]" id="postal-code" value="{{ ($shipping != null) ? $shipping->postal_code : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.postal-code')" />
            </div>
        </div>
    </div>
</div>
