<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Gebruiker overview</h1>
          <p class="mt-2 text-sm text-gray-700">Hier heb je een aanmakings formulier voor nieuwe klanten.</p>
        </div>
    </header>

    <div class="mt-6 space-y-6">
        {{-- First name user --}}
        <div>
            <x-input-label for="first_name" :value="__('Gebruikers Voornaam.')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name')" required autocomplete="first_name" required />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>


        {{-- First name user --}}
        <div>
            <x-input-label for="last_name" :value="__('Gebruikers Achternaam.')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name')" required autocomplete="last_name" required />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>


         {{-- Email user --}}
        <div>
            <x-input-label for="email" :value="__('Gebruikers Email.')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="email" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>


        {{-- User role --}}
        <div>
            <x-input-label for="role_id" :value="__('Product kwantiteit.')" />
            <div>
                <div class="mt-2 grid grid-cols-1">
                    <select id="role_id" name="role_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $roleArray[$role->name] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('role_id')" />
        </div>


        {{-- User Password --}}
        <div>
            <x-input-label for="password" :value="__('Gebruikers Wachtwoord')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" required />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>


        {{-- User Confirmed Password --}}
        <div>
            <x-input-label for="password_confirmation" :value="__('Gebruikers Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" required />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>


        {{-- User Newsletter --}}
        <div>
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="newsletter" aria-describedby="newsletter-description" name="newsletter" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                        <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                            <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="newsletter" class="font-medium text-gray-900">Abboneren op nieuwsbrief</label>
                    <span id="newsletter-description" class="text-gray-500"><span class="sr-only"></span>Maakt de gebruiker automatisch geabonneerd op de nieuwsbrief.</span>
                </div>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('newsletter')" />
        </div>


        {{-- buttons --}}
        <div class="flex items-center gap-4">
            <x-redirect-button :name="__('Terug')" :route="route('cms.users.index')" />

            <x-primary-button class="bg-logoBackground hover:bg-logoBackground/80">{{ __('Save') }}</x-primary-button>
        </div>
    </div>
</section>
