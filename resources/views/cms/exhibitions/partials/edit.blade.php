<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Beurs Aanmaken</h1>
          <p class="mt-2 text-sm text-gray-700">Hier heb je een form voor het aanmaken van een nieuwe beurs.</p>
        </div>
    </header>

    <form method="POST" action="{{ route('cms.exhibition.update', $exhibition->id) }}">
        @csrf
        @method('patch')

        <div class="mt-6 space-y-6">
            {{-- Exhibition Name --}}
            <div>
                <x-input-label for="exhibition_name" :value="__('Beurs Naam')" />
                <x-text-input id="exhibition_name" name="exhibition_name" type="text" class="mt-1 block w-full" :value="old('exhibition_name', $exhibition->exhibition_name)" required />
                <x-input-error class="mt-2" :messages="$errors->get('exhibition_name')" />
            </div>


            {{-- Exhibition Location --}}
            <div>
                <x-input-label for="exhibition_location" :value="__('Beurs Locatie.')" />
                <x-text-input id="exhibition_location" name="exhibition_location" type="text" class="mt-1 block w-full" :value="old('exhibition_location', $exhibition->exhibition_location)" required />
                <x-input-error class="mt-2" :messages="$errors->get('exhibition_location')" />
            </div>


            {{-- Exhibition Date --}}
            <div>
                <x-input-label for="exhibition_date" :value="__('Datum Beurs.')" />
                <x-text-input id="exhibition_date" name="exhibition_date" type="date" class="mt-1 block w-full" :value="old('exhibition_date', $exhibition->exhibition_date)" required />
                <x-input-error class="mt-2" :messages="$errors->get('exhibition_date')" />
            </div>


            {{-- Exhibition Start Time --}}
            <div>
                <x-input-label for="exhibition_opening_time" :value="__('Begin Tijd Beurs.')" />
                <x-text-input id="exhibition_opening_time" name="exhibition_opening_time" type="time" class="mt-1 block w-full" :value="old('exhibition_opening_time', $exhibition->exhibition_opening_time)" required />
                <x-input-error class="mt-2" :messages="$errors->get('exhibition_opening_time')" />
            </div>


            {{-- Exhibition Start Time --}}
            <div>
                <x-input-label for="exhibition_closing_time" :value="__('Eind Tijd Beurs.')" />
                <x-text-input id="exhibition_closing_time" name="exhibition_closing_time" type="time" class="mt-1 block w-full" :value="old('exhibition_closing_time', $exhibition->exhibition_closing_time)" required />
                <x-input-error class="mt-2" :messages="$errors->get('exhibition_closing_time')" />
            </div>


            {{-- Present At Exhibition --}}
            <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input {{ ($exhibition->present == 1) ? "checked" : "" }} id="checkbox" aria-describedby="checkbox" name="present" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-logoBackground checked:bg-logoborder-logoBackground indeterminate:border-logoBackground indeterminate:bg-logoborder-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logoborder-logoBackground disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                        <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                            <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm/6">
                    <label for="checkbox" class="font-medium text-gray-900">Aanwezig op deze beurs:</label>
                </div>
            </div>

            {{-- buttons --}}
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </div>
    </form>
</section>
