<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Business Settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Here you can set important settings for the website and the business.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.business') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- business business_email --}}
        <div>
            <x-input-label for="business_email" :value="__('Bedrijfs Email')" />
            <x-text-input id="business_email" name="business_email" type="email" class="mt-1 block w-full" :value="old('business_email', $business->business_email)" required />
            <x-input-error class="mt-2" :messages="$errors->get('business_email')" />
        </div>

        {{-- business kvk_number --}}
        <div>
            <x-input-label for="kvk_number" :value="__('Bedrijfs KVK Nummer')" />
            <x-text-input id="kvk_number" name="kvk_number" type="text" class="mt-1 block w-full" :value="old('kvk_number', $business->kvk_number)" required />
            <x-input-error class="mt-2" :messages="$errors->get('kvk_number')" />
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
