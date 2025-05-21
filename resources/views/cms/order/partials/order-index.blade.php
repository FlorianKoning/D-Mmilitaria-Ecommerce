<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Bestel Overzicht</h1>
        <p class="mt-2 text-sm text-gray-700">Hier heb je de overview tabel van alle bestellingen. Hier kan je ook nieuwe bestellingens editen en verwijderen.</p>
      </div>
    </div>
    <div class="mt-8 flow-root">
      <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
          <table class="min-w-full divide-y divide-gray-300">
            <thead>
              <tr>
                {{-- sets up the website ready column names --}}
                @foreach ($columnNames as $column)
                    <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">{{ $column }}</th>
                @endforeach
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Opties</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($orders as $order)
                    <tr>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $order->order_number }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $paymentOptions[$order->payment_name] }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          {{ (isset($order->user_id)) ? $order->userFirstName.' '. $order->userLastName : $order->guestFirstname.' '.$order->guestLastName.' (Guest)'  }}
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $order->payment_amount }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                          <button type="button" class="rounded-md {{ $statusColors[$order->orderStatusName] }} px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobg-logoBackground cursor-default">
                            {{ $order->orderStatusName }}
                          </button>
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $order->created_at }}</td>
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
                                {{-- Edit order --}}
                                <x-dropdown-link :href="route('cms.orders.edit', $order->id)">
                                      {{ __('Update Status') }}
                                </x-dropdown-link>

                                {{-- View Product --}}
                                <x-dropdown-link :href="route('cms.orders.show', $order->id)">
                                    {{ __('Bestelling Producten') }}
                                </x-dropdown-link>

                                 {{-- Shipping Information --}}
                                <x-dropdown-link :href="route('cms.orders.shipping', $order->id)">
                                    {{ __('Verzendings Informatie') }}
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
<x-warning-modal :catagory="__('catagory')" />
<input class="bg-blue-600 bg-sky-500 bg-amber-500 bg-purple-500 bg-yellow-300 bg-red-600 bg-emerald-400 bg-teal-400 bg-green-400" type="hidden">
