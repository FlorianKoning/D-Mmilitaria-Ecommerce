<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Producten overview</h1>
          <p class="mt-2 text-sm text-gray-700">Hier heb je de overview tabel van alle producten. Hier kan je ook nieuwe producten toevoegen, editen en verwijderen.</p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('cms.products.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf

        {{-- image upload --}}
        <div class="col-span-full">
            <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Product foto.</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                  <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                </svg>
                <div class="mt-4 flex text-sm/6 text-gray-600">
                  <label for="productImage" class="relative cursor-pointer rounded-md bg-white font-semibold text-logoBackground focus-within:outline-none focus-within:ring-2 focus-within:ring-logotext-logoBackground focus-within:ring-offset-2 hover:text-logoBackground">
                    <span class="ml-7">Upload a file</span>
                    <input id="productImage" name="productImage" type="file" class="sr-only">
                  </label>
                </div>
                <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
              </div>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('productImage')" />
        </div>

        {{-- product inventory number --}}
        <div>
            <x-input-label for="invNumb" :value="__('Product inventory nummer.')" />
            <x-text-input id="invNumb" name="invNumb" type="text" class="mt-1 block w-full" :value="old('invNumb')" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('invNumb')" />
        </div>

        {{-- product name --}}
        <div>
            <x-input-label for="name" :value="__('Product naam.')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- small description --}}
        <div>
            <x-input-label for="smallDesc" :value="__('Kleine producten beschrijving.')" />
            <div>
                <div class="mt-2">
                  <textarea rows="4" name="smallDesc" id="smallDesc" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">{{ old('smallDesc') }}</textarea>
                </div>
              </div>
            <x-input-error class="mt-2" :messages="$errors->get('smallDesc')" />
        </div>

        {{-- big description --}}
        <div>
            <x-input-label for="bigDesc" :value="__('Grote producten beschrijving.')" />
            <div>
                <div class="mt-2">
                  <textarea rows="4" name="bigDesc" id="bigDesc" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">{{ old('bigDesc') }}</textarea>
                </div>
              </div>
            <x-input-error class="mt-2" :messages="$errors->get('bigDesc')" />
        </div>


        {{-- product catagory --}}
        <div>
            <x-input-label for="catagory" :value="__('Product catagory.')" />
            <x-text-input id="catagory" name="catagory" type="text" class="mt-1 block w-full" :value="old('catagory')" required autofocus autocomplete="catagory" />
            <x-input-error class="mt-2" :messages="$errors->get('catagory')" />
        </div>


        {{-- product inventory --}}
        <div>
            <x-input-label for="inventory" :value="__('Product kwantiteit.')" />
            <x-text-input id="inventory" name="inventory" type="number" min="1" class="mt-1 block w-full" :value="old('inventory')" required autofocus autocomplete="inventory" />
            <x-input-error class="mt-2" :messages="$errors->get('inventory')" />
        </div>


        {{-- product price --}}
        <div>
            <x-input-label for="price" :value="__('Product price.')" />
            <x-text-input id="price" name="price" type="number" step=".01" class="mt-1 block w-full" :value="old('price')" required autofocus autocomplete="price" />
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>

        {{-- discount checkbox --}}
        <div class="flex flex-col space-y-6">
            <x-cms-checkbox :inputName="__('checkBoxSale')" :text="__('Aangepaste Korting')" />

            <div id="saleBox" class="flex flex-col space-y-6 hidden" >
                {{-- discount percentage --}}
                <div id="discountPercentage">
                    <x-input-label for="discountPercentage" :value="__('Korting percentage')" />
                    <x-text-input id="discountPercentage" name="discountPercentage" type="number" min="1" step=".01" class="mt-1 block w-full" :value="old('discountPercentage')" autofocus autocomplete="discountPercentage" />
                    <x-input-error class="mt-2" :messages="$errors->get('discountPercentage')" />
                </div>

                {{-- discount start and end date --}}
                <div class="flex flex-row gap-x-3">
                    {{-- start date --}}
                    <div id="discountStartDate">
                        <x-input-label for="discountStartDate" :value="__('Korting begin datum')" />
                        <x-text-input id="discountStartDate" name="discountStartDate" type="date" min="1" step=".01" class="mt-1 block w-full" :value="old('discountStartDate')" autofocus autocomplete="discountStartDate" />
                        <x-input-error class="mt-2" :messages="$errors->get('discountStartDate')" />
                    </div>

                    {{-- end date --}}
                    <div id="discountEndDate">
                        <x-input-label for="discountEndDate" :value="__('Korting eind datum')" />
                        <x-text-input id="discountEndDate" name="discountEndDate" type="date" min="1" step=".01" class="mt-1 block w-full" :value="old('discountEndDate')" autofocus autocomplete="discountEndDate" />
                        <x-input-error class="mt-2" :messages="$errors->get('discountEndDate')" />
                    </div>
                </div>
            </div>
        </div>



        {{-- buttons --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
