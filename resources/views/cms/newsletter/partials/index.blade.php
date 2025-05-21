<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Newsletter Overzicht</h1>
        <p class="mt-2 text-sm text-gray-700">Hier heb je een overzicht van alle gebruikers die zich hebben aangemeld voor een nieuwsbrief. Je kunt alle gebruikers exporteren als een excel bestand.</p>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <form method="POST" action="{{ route('cms.newsletter.excel.download') }}">
            @csrf

            <button class="block rounded-md bg-logoBackground px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#3C8DBC] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#3C8DBC]">
                Excel Download
            </button>
        </form>
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
                @foreach ($newsletters as $value)
                    <tr>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $value->first_name }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $value->last_name }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $value->email }}</td>
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
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    {{-- delete options --}}
                                    <x-dropdown-link >
                                        <button onclick="warningModel('{{ route('cms.newsletter.destroy', $value->id) }}', '{{ $value->name }}')">{{ __('Verwijder') }}</button>
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
<x-warning-modal :catagory="__('gebruiker van newsletter')" />




