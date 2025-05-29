<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Verkochte Producten Overview</h1>
        <p class="mt-2 text-sm text-gray-700">Hier kan je alle verkochte producten vinden. Je kunt ook hier producten weer verkochtbaar maken.</p>

        <x-input-error class="mt-2" :messages="$errors->get('inventory')" />
        <x-input-error class="mt-2" :messages="$errors->get('active')" />
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
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($products as $value)
                    <tr>
                        <td class="whitespace-nowrap pr-2 py-2 text-sm font-medium text-gray-900">{{ $value->inventory_number }}</td>
                        <td class="whitespace-nowrap pr-2 py-2 text-sm font-medium text-gray-900">{{ substr($value->small_desc, 0, 35) }}</td>
                        <td class="whitespace-nowrap pr-2 py-2 text-sm font-medium text-gray-900">
                            <form id="{{ $value->id }}-form" method="POST" action="{{ route('cms.soldProducts.update', $value->id) }}">
                                @csrf
                                @method('patch')
                                <p class="cursor-pointer" onclick="inventoryUpdate('{{ $value->id }}-inventory', '{{ $value->id }}-input')" id="{{ $value->id }}-inventory">{{ $value->inventory }}</p>

                                {{-- Set Order Mail --}}
                                <div onchange="$('#{{ $value->id }}-form').submit()" id="{{ $value->id }}-input" class="hidden">
                                    <x-text-input :width="__('20')" id="inventory" name="inventory" type="number" min="0" :value="old('inventory')" required autofocus autocomplete="inventory" />
                                    <x-input-error class="mt-2" :messages="$errors->get('inventory')" />
                                </div>
                            </form>
                        </td>
                        <td class="whitespace-nowrap pr-2 py-2 text-sm font-medium text-gray-900">{{ $value->price }}</td>
                        <td class="whitespace-nowrap pr-2 py-2 text-sm font-medium text-gray-900">{{ ($value->discount_percentage != null) ? $value->discount_percentage.'%' : '-' }}</td>
                        <td class="whitespace-nowrap pr-2 py-2 text-sm font-medium text-gray-900">{{ ($value->discount_start_date != null) ? $value->discount_start_date : '-' }}</td>
                        <td class="whitespace-nowrap pr-2 py-2 text-sm font-medium text-gray-900">{{ ($value->discount_end_date != null) ? $value->discount_end_date : '-' }}</td>
                        <td class="whitespace-nowrap pr-2 py-2 text-sm font-medium text-gray-900">
                            <form method="POST" action="{{ route('cms.soldProducts.active', $value->id) }}">
                                @csrf
                                @method('patch')

                                @if ($value->is_active == 1)
                                    <button name="active" value="false" type="submit" class="inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                                        <svg class="-ml-0.5 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                        </svg>
                                        Actief
                                    </button>
                                @else
                                    <button name="active" value="true" type="submit" class="inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fizll="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        In Actief
                                    </button>
                                @endif
                            </form>
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
<x-warning-modal :catagory="__('catagory')" />

<script>
    function inventoryUpdate(amountId, inputId) {
        $('#'+amountId).fadeOut().addClass('hidden');
        $('#'+inputId).fadeIn().removeClass('hidden');
    }
</script>
