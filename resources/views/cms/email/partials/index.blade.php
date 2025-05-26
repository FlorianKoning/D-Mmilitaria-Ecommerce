<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Email Settings</h1>
          <p class="mt-2 text-sm text-gray-700">Hier vind je een formulier waar je je email settings kan configureren.</p>
        </div>
    </header>


    <form method="POST" action="{{ route('cms.emailsSettings.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf
        {{-- Set Order Mail --}}
        <div>
            <x-input-label for="order_email" :value="__('Ontvang bestellingen op dit e-mailadres')" />
            <x-text-input placeholder="{{ env('APP_MAIL') }}" id="order_email" name="order_email" type="email" class="mt-1 block w-full" :value="old('order_email', $emailSettings->order_email)" required autocomplete="order_email" />
            <x-input-error class="mt-2" :messages="$errors->get('order_email')" />
        </div>

        {{-- buttons --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
