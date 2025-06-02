<div class="mx-auto max-w-2xl px-4 pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Checkout</h2>

    <form method="POST" action="{{ route('profile.shipping.store') }}">
        @csrf
        <div>
          <div class="border-gray-200 pt-10">
            <h2 class="text-lg font-medium text-gray-900">Your personal shipping information</h2>
            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">

              {{-- user first name --}}
              <div>
                <label for="first-name" class="block text-sm/6 font-medium text-gray-700">First name <span class="text-red-500">*</span></label>
                <x-text-input id="first-name" name="first-name" type="text" class="mt-2 block w-full" :value="(isset($shipping->first_name)) ? $shipping->first_name : old('first-name')" required />
                <x-input-error class="mt-2" :messages="$errors->get('first-name')" />
              </div>

              {{-- user last name --}}
              <div>
                <label for="last-name" class="block text-sm/6 font-medium text-gray-700">Last name <span class="text-red-500">*</span></label>
                <x-text-input id="last-name" name="last-name" type="text" class="mt-2 block w-full" :value="(isset($shipping->last_name)) ? $shipping->last_name : old('last-name')" required />
                <x-input-error class="mt-2" :messages="$errors->get('last-name')" />
              </div>

              {{-- user company name --}}
              <div>
                <label for="company" class="block text-sm/6 font-medium text-gray-700">Company</label>
                <x-text-input id="company" name="company" type="text" class="mt-2 block w-full" :value="(isset($shipping->company)) ? $shipping->company : old('company')" />
                <x-input-error class="mt-2" :messages="$errors->get('company')" />
              </div>

              {{-- user address --}}
              <div>
                <label for="address" class="block text-sm/6 font-medium text-gray-700">Address <span class="text-red-500">*</span></label>
                <x-text-input id="address" name="address" type="text" class="mt-2 block w-full" :value="(isset($shipping->address)) ? $shipping->address : old('address')" required />
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
              </div>

              {{-- user country --}}
              <div>
                <label for="country" class="block text-sm/6 font-medium text-gray-700">Shipping Country </label>
                <div class="grid grid-cols-1">
                    <select id="shippingCountry" name="shippingCountry" class="mt-2 block w-full rounded-md bg-[#F3F5F7] border-[#F3F5F7]/80 px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
                        @foreach ($countries as $country)
                            <option {{ (isset($shipping->shippingCountry_id) && $shipping->shippingCountry_id == $country->id) ? "checked" : null }} value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('country')" />
              </div>

              {{-- user city --}}
              <div>
                <label for="city" class="block text-sm/6 font-medium text-gray-700">City <span class="text-red-500">*</span></label>
                <x-text-input id="city" name="city" type="text" class="mt-2 block w-full" :value="(isset($shipping->city)) ? $shipping->city : old('city')" required />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
              </div>

              {{-- postal code --}}
              <div>
                <label for="postal-code" class="block text-sm/6 font-medium text-gray-700">Postal code <span class="text-red-500">*</span></label>
                <x-text-input id="postal-code" name="postal-code" type="text" class="mt-2 block w-full" :value="(isset($shipping->postal_code)) ? $shipping->postal_code : old('postal-code')" required />
                <x-input-error class="mt-2" :messages="$errors->get('postal-code')" />
              </div>

              {{-- phone number --}}
              <div>
                <label for="phone" class="block text-sm/6 font-medium text-gray-700">Phone number <span class="text-red-500">*</span></label>
                <x-text-input id="phone" name="phone" type="text" class="mt-2 block w-full" :value="(isset($shipping->phone_number)) ? $shipping->phone_number : old('phone')" required />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
              </div>

              <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Opslaan') }}</x-primary-button>
            </div>
            </div>
          </div>
        </div>
    </form>
</div>
