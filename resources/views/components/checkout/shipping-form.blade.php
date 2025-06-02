@props(['shipping', 'provinces', 'countries'])
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
            <label for="phone" class="block text-sm/6 font-medium text-gray-700">Phone Number <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[phone]" id="phone" value="{{ ($shipping != null) ? $shipping->phone_number : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.phone')" />
        </div>
    </div>
</div>

<div class="mt-10 border-t border-gray-200 pt-10">
    <h2 class="text-lg font-medium text-gray-900">Shipping Information</h2>

    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
        <div>
            <label for="first-name" class="block text-sm/6 font-medium text-gray-700">First name <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" id="first-name" name="shipping[first-name]" value="{{ ($shipping != null) ? $shipping->first_name : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.first-name')" />
        </div>

        <div>
            <label for="last-name" class="block text-sm/6 font-medium text-gray-700">Last name <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" id="last-name" name="shipping[last-name]" value="{{ ($shipping != null) ? $shipping->last_name : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.last-name')" />
        </div>

        <div class="sm:col-span-2">
            <label for="company" class="block text-sm/6 font-medium text-gray-700">Company</label>
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
            <label for="shippingCountry" class="block text-sm/6 font-medium text-gray-700">Country</label>
            <div class="grid grid-cols-1">
                    <select id="shippingCountry" name="shipping[shippingCountry]" class="mt-2 block w-full rounded-md bg-[#F3F5F7] border-[#F3F5F7]/80 px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
                        @foreach ($countries as $country)
                            <option {{ (isset($shipping->shippingCountry_id) && $shipping->shippingCountry_id == $country->id) ? "checked" : null }} value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.shippingCountry')" />
        </div>

        <div>
            <label for="city" class="block text-sm/6 font-medium text-gray-700">City <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[city]" id="city" value="{{ ($shipping != null) ? $shipping->city : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.city')" />
        </div>

        <div>
            <label for="postal-code" class="block text-sm/6 font-medium text-gray-700">Postal Code <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[postal-code]" id="postal-code" value="{{ ($shipping != null) ? $shipping->postal_code : '' }}" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <x-checkout-input-error class="mt-2" :messages="$errors->get('shipping.postal-code')" />
            </div>
        </div>
    </div>
</div>
