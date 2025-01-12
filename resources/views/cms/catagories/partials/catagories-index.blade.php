<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Catagorie overview</h1>
        <p class="mt-2 text-sm text-gray-700">Hier heb je de overview tabel van alle catagorien. Hier kan je ook nieuwe catagorien toevoegen, editen en verwijderen.</p>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <x-redirect-button :route="route('cms.catagories.create')" :name="__('Catagorie toevoegen')" />
      </div>
    </div>
    <div class="mt-8 flow-root">
      <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
          <table class="min-w-full divide-y divide-gray-300">
            <thead>
              <tr>
                {{-- sets up the website ready column names --}}
                @foreach ($columnNames as $value)
                    <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">{{ $value }}</th>
                @endforeach
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Edit</th>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Verwijder</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($catagories as $value)
                    <tr>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $value->name }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                            <a href="{{ route('cms.catagories.edit', $value->id) }}">
                                <button class="rounded-md bg-logoBackground px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobg-logoBackground">
                                    {{ __('Edit') }}
                                </button>
                            </a>
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                            <button onclick="warningModel()" class="rounded-md bg-logoBackground px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobg-logoBackground">
                                {{ __('Verwijder') }}
                            </button>
                        </td>
                        {{-- warning model --}}
                        <x-warning-modal :catagory="__('catagory')" :route="route('cms.catagories.delete', $value->id)" :name="$value->name" />
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>




