@props(['id'])

<form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="{{ route('cms.extraFeatures.edit', $id) }}">
    @csrf

    <div id="extraFeaturesEdit" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative w-[450px] transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:max-w-lg sm:p-6 space-y-10">
              <div class="space-y-10">
                {{-- exta image name --}}
                <div>
                    <x-input-label for="featureName" :value="__('Beschrijving van de feature')" />
                    <x-text-input id="featureName" name="featureName" type="text" class="mt-1 block w-full" :value="old('featureName')" required autofocus autocomplete="featureName" />
                    <x-input-error class="mt-2" :messages="$errors->get('featureName')" />
                </div>
              </div>
              <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-logoBackground px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobabg-logoBackground sm:col-start-2">Uploaden</button>
                <button onclick="closeModal('extraFeaturesEdit')" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</form>

