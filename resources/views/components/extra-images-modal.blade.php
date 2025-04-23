@props(['id'])

<form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="{{ route('cms.extraImages.create', $id) }}">
    @csrf

    <div id="extraImages" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:max-w-lg sm:p-6 space-y-10">
              <div class="space-y-10">
                {{-- extra image input --}}
                <div class="col-span-full">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold text-gray-900">Extra foto toevoegen</h1>
                        <p class="mt-2 text-sm text-gray-700">Hier upload u de extrafoto die de gebruiker kan zien op de product pagina.</p>
                    </div>
                    <div id="drop-area" class="droparea mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                <label for="imageCreate" class="relative cursor-pointer rounded-md bg-white font-semibold text-logoBackground focus-within:outline-none focus-within:ring-2 focus-within:ring-logotext-logoBackground focus-within:ring-offset-2 hover:text-logoBackground">
                                  <span id="uploadTitle" class="ml-1">Upload hier uw extra foto's</span>
                                  <span id="fileDisplay" class="ml-1 hidden"></span>

                                  <input id="imageCreate" multiple="" name="imageCreate[]" type="file" class="sr-only" data-max_length="20">
                                </label>
                            </div>
                            <p class="text-xs/5 text-gray-600">PNG, JPG up to 10MB</p>
                        </div>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('imageCreate')" />
                </div>


                {{-- exta image name --}}
                <div>
                    <x-input-label for="extraImageName" :value="__('Naam van extra foto')" />
                    <x-text-input id="extraImageName" name="extraImageName" type="text" class="mt-1 block w-full" :value="old('extraImageName')" required autofocus autocomplete="extraImageName" />
                    <x-input-error class="mt-2" :messages="$errors->get('extraImageName')" />
                </div>
              </div>
              <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-logoBackground px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobabg-logoBackground sm:col-start-2">Uploaden</button>
                <button onclick="closeModal('extraImages')" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</form>

