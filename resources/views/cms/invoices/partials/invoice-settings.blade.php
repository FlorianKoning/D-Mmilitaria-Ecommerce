<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Factuur Settings Bewerken</h1>
          <p class="mt-2 text-sm text-gray-700">Hier kunt u belangrijke informatie van de facturen bewerken.</p>
        </div>
    </header>


    <form method="POST" action="{{ route('cms.invoice.settings.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf

        {{-- Bank Account Number --}}
        <div>
            <x-input-label for="bankaccount_number" :value="__('Bankaccount Nummer')" />
            <x-text-input id="bankaccount_number" name="bankaccount_number" type="text" class="mt-1 block w-full" :value="old('bankaccount_number', $invoiceSettings->bankaccount_number)" required autocomplete="bankaccount_number" />
            <x-input-error class="mt-2" :messages="$errors->get('bankaccount_number')" />
        </div>


        {{-- Bank Account Number --}}
        <div>
            <x-input-label for="address" :value="__('Bankaccount Naam')" />
            <x-text-input id="bankaccount_name" name="bankaccount_name" type="text" class="mt-1 block w-full" :value="old('bankaccount_name', $invoiceSettings->bankaccount_name)" required autocomplete="bankaccount_name" />
            <x-input-error class="mt-2" :messages="$errors->get('bankaccount_name')" />
        </div>


        {{-- Company Name --}}
        <div>
            <x-input-label for="KVK_number" :value="__('Bedrijfs Naam')" />
            <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name', $invoiceSettings->company_name)" required autocomplete="company_name" />
            <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
        </div>


        {{-- KVK Number --}}
        <div>
            <x-input-label for="KVK_number" :value="__('KVK Nummer')" />
            <x-text-input id="KVK_number" name="KVK_number" type="text" class="mt-1 block w-full" :value="old('KVK_number', $invoiceSettings->KVK_number)" required autocomplete="KVK_number" />
            <x-input-error class="mt-2" :messages="$errors->get('KVK_number')" />
        </div>


        {{-- Phone number --}}
        <div>
            <x-input-label for="phone_number" :value="__('Bedrijfs Telefoon Nummer')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $invoiceSettings->phone_number)" required autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>


        {{-- Address --}}
        <div>
            <x-input-label for="address" :value="__('Bedrijfs address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $invoiceSettings->address)" required autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>


        {{-- buttons --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
