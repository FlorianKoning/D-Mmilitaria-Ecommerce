<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="w-full flex justify-center mb-4">
            <h2 class="text-navBackground font-bold text-2xl">Account Aanmaken</h2>
        </div>

        <div class="flex flex-row w-full gap-6">
            <!-- Frist Name -->
            <div class="flex-1 mt-4">
                <x-input-label class="text-gray-900" for="first_name" :value="__('Voornaam')" />
                <x-text-input id="first_name" class="bg-[#F3F5F7] border-[#F3F5F7]/80 block mt-1 w-full text-gray-900" type="text" name="first_name" :value="old('first_name')" required autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="flex-1 mt-4">
                <x-input-label class="text-gray-900" for="last_name" :value="__('Achternaam')" />
                <x-text-input id="last_name" class="bg-[#F3F5F7] border-[#F3F5F7]/80 block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>


        <!-- name Address -->
        <div class="mt-4">
            <x-input-label class="text-gray-900" for="email" :value="__('Emailadres')" />
            <x-text-input id="email" class="bg-[#F3F5F7] border-[#F3F5F7]/80 block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="text-gray-900" for="password" :value="__('Wachtwoord')" />

            <x-text-input id="password" class="bg-[#F3F5F7] border-[#F3F5F7]/80 block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="text-gray-900" for="password_confirmation" :value="__('Wachtwoord herhalen')" />

            <x-text-input id="password_confirmation" class="bg-[#F3F5F7] border-[#F3F5F7]/80 block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex ietms-center justify-between mt-4">
            <div class="flex gap-2">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" checked class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                        <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                            <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="comments" class="font-medium text-gray-900">Schrijf in voor onze nieuwsbrief.</label>
                </div>
            </div>

            <div>
                <a  class="underline text-sm text-gray-900 hover:text-navBackground rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2" href="{{ route('login') }}">
                    {{ __('Al een account?') }}
                </a>

                <x-primary-button class="ms-4 bg-navBackground hover:bg-navBackground/90">
                    {{ __('Registreren') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
