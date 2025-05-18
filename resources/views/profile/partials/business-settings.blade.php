<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Business Settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Here you can set important settings for the website and the business.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.business') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Business Logo --}}
        <div class="col-span-full">
            <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Cover photo</label>
            <div id="drop-area" class="droparea mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                @if ($business->business_logo != null && strlen($business->business_logo) > 0)
                    <img class="mx-auto size-20 rounded-full" src="{{ $business->business_logo }}" alt="Logo of the application">
                @else
                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                    </svg>
                @endif
                <div class="mt-4 flex text-sm/6 text-gray-600">
                  <label for="business_logo" class="relative cursor-pointer rounded-md bg-white font-semibold text-navBackground focus-within:outline-none focus-within:ring-2 focus-within:ring-navBacktext-navBackground focus-within:ring-offset-2 hover:text-navBackground">
                    <span id="fileDisplay" class="ml-4">Upload a file</span>
                    <input id="imageCreate" name="business_logo" type="file" class="sr-only">
                  </label>
                </div>
                <p class="text-xs/5 text-gray-600">PNG, JPG up to 10MB</p>
              </div>
            </div>
        </div>

        {{-- business business_email --}}
        <div>
            <x-input-label for="business_email" :value="__('Bedrijfs Email')" />
            <x-text-input id="business_email" name="business_email" type="email" class="mt-1 block w-full" :value="old('business_email', $business->business_email)" required />
            <x-input-error class="mt-2" :messages="$errors->get('business_email')" />
        </div>

        {{-- Bank Account Number --}}
        <div>
            <x-input-label for="bankaccount_number" :value="__('Bankaccount Nummer')" />
            <x-text-input id="bankaccount_number" name="bankaccount_number" type="text" class="mt-1 block w-full" :value="old('bankaccount_number', $business->bankaccount_number)" required autocomplete="bankaccount_number" />
            <x-input-error class="mt-2" :messages="$errors->get('bankaccount_number')" />
        </div>

        {{-- KVK Number --}}
        <div>
            <x-input-label for="KVK_number" :value="__('KVK Nummer')" />
            <x-text-input id="KVK_number" name="KVK_number" type="text" class="mt-1 block w-full" :value="old('KVK_number', $business->kvk_number)" required autocomplete="KVK_number" />
            <x-input-error class="mt-2" :messages="$errors->get('KVK_number')" />
        </div>

        {{-- business btw_number --}}
        <div>
            <x-input-label for="btw_number" :value="__('Bedrijfs BTW Nummer')" />
            <x-text-input id="btw_number" name="btw_number" type="text" class="mt-1 block w-full" :value="old('btw_number', $business->btw_number)" required />
            <x-input-error class="mt-2" :messages="$errors->get('btw_number')" />
        </div>

        {{-- business business_address --}}
        <div>
            <x-input-label for="business_address" :value="__('Bedrijfs Address')" />
            <x-text-input id="business_address" name="business_address" type="text" class="mt-1 block w-full" :value="old('business_address', $business->business_address)" required />
            <x-input-error class="mt-2" :messages="$errors->get('business_address')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
