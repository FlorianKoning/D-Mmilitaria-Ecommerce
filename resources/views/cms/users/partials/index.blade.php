<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <div class="w-full flex flex-row gap-2">
            <h1 class="text-base font-semibold text-gray-900 my-auto">Gebruikers overzicht</h1>
            
            @if (isset($_GET['option']))
                <button class="bg-logoBackground p-1 text-white rounded-lg">    
                    <p class="text-base font-semibold">Optie: {{ $orderOptions[$_GET['option']] }}</p>
                </button>
            @endif
        </div>
        <p class="mt-2 text-sm text-gray-700">Hier heb je de overview tabel van alle gebruikers. Hier kan je ook nieuwe gebruikers toevoegen, editen en verwijderen.</p>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <x-redirect-button :route="route('cms.users.create')" :name="__('Gebruiker toevoegen')" />
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
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Opties</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($users as $value)
                    <tr>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $value->first_name }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $value->last_name }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $value->email }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $roleArray[$value->role_name] }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                            @if ($value->newsletter == 1)
                                <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 cursor-default">
                                    <svg class="-ml-0.5 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                    </svg>
                                    Geabonneerd
                                </button>
                            @else
                                <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 cursor-default">
                                    <svg xmlns="http://www.w3.org/2000/svg" fizll="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                    Niet Geabonneerd
                                </button>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $value->created_at }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-white">
                            <x-dropdown align="left" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-logoBackground focus:outline-none transition ease-in-out duration-150">
                                        <div>Opties</div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>`
                                </x-slot>

                                <x-slot name="content">
                                    {{-- edit options --}}
                                    <x-dropdown-link :href="route('cms.users.edit', $value->id)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>


                                    {{-- delete options --}}
                                    <x-dropdown-link >
                                        <button onclick="warningModel('{{ route('cms.users.delete', $value->id) }}', '{{ $value->name }}')">{{ __('Verwijder') }}</button>
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>


{{-- warning model --}}
<x-warning-modal :catagory="__('gebruiker')" />




