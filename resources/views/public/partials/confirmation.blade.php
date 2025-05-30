<section>
    <div class="bg-white">
        <div class="mx-auto max-w-full px-6 lg:px-8">
          <div class="max-w-2xl">
            <p class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl lg:text-balance">Thank you for your order!</p>
            <p class="mt-6 text-lg/8 text-gray-600">We’ve received your order and have started processing it right away.</p>
            <p class="text-lg/8 text-gray-600">You’ll receive a confirmation email with all the details shortly.</p>
        </div>

          {{-- divider --}}
          <div class="mt-4 mb-6 max-w-full border-b"></div>

          <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="border-b border-t border-gray-200 bg-white shadow-sm sm:rounded-lg sm:border">
                <div class="flex items-center border-b border-gray-200 p-4 sm:grid sm:grid-cols-4 sm:gap-x-6 sm:p-6">
                    <dl class="grid flex-1 grid-cols-2 gap-x-6 text-sm sm:col-span-4 sm:grid-cols-4 lg:col-span-2">
                        <div>
                            <dt class="font-medium text-gray-900">Order Number</dt>
                            <dd class="mt-1 text-gray-500">{{ $order->order_number }}</dd>
                        </div>
                        <div class="hidden sm:block">
                            <dt class="font-medium text-gray-900">Order created alt</dt>
                            <dd class="mt-1 text-gray-500">
                                <time datetime="2021-07-06">{{ $order->created_at }}</time>
                            </dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-900">Order amount</dt>
                            <dd class="mt-1 font-medium text-gray-900">€{{ $order->payment_amount }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-900">Order status</dt>
                            <dd class="mt-1 font-medium text-gray-900">
                                <button type="button" class="rounded {{ $orderStatusColor[$orderStatusRepository->find($order->order_status_id)['status']] }} px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    {{ $orderStatusRepository->find($order->order_status_id)['status'] }}
                                </button>
                            </dd>
                        </div>
                    </dl>

                    <div class="relative flex justify-end lg:hidden">
                        <div class="absolute right-0 z-10 mt-2 w-40 origin-bottom-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-1">Invoice</a>
                            </div>
                        </div>
                    </div>

                    {{-- Order buttons --}}
                    <div class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">
                        <a href="{{ route('download.invoice', $order->id) }}" class="flex items-center justify-center rounded-md border border-gray-300 bg-white px-2.5 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-navBackground focus:ring-offset-2">
                            <span>Download Invoice</span>
                        </a>
                    </div>
                </div>

                <!-- Products -->
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach (json_decode($order->order_items) as $item)
                        @php
                            $product = $productModel::find($item->id);
                        @endphp

                        <li class="p-4 sm:p-6">
                            <div class="flex items-center sm:items-start">
                                <div class="size-20 shrink-0 overflow-hidden rounded-lg bg-gray-200 sm:size-40">
                                    <img src="{{ $product['main_image'] }}" alt="Moss green canvas compact backpack with double top zipper, zipper front pouch, and matching carry handle and backpack straps." class="size-full object-cover">
                                </div>
                                <div class="ml-6 flex-1 text-sm">
                                    <div class="font-medium text-gray-900 sm:flex sm:justify-between">
                                        <h5 class="font-semibold">{{ $product['name'] }}</h5>
                                        <p class="mt-2 sm:mt-0">€{{ $product['price'] }}</p>
                                    </div>
                                    <p class="hidden text-gray-500 sm:mt-2 sm:block">{{ $product['big_desc'] }}</p>
                                </div>
                            </div>

                            <div class="mt-6 sm:flex sm:justify-between lg:justify-end">
                                <div class="mt-6 flex items-center divide-x divide-gray-200 border-t border-gray-200 pt-4 text-sm font-medium sm:ml-4 sm:mt-0 sm:border-none sm:pt-0">
                                    <div class="flex flex-1 justify-center pr-4">
                                        <a href="{{ route('products.show', $product['id']) }}" class="whitespace-nowrap text-sky-600 hover:text-sky-500">View product</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
          </div>

          <div class="mx-auto max-w-full px-6 lg:px-8">
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
              <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                <div class="flex flex-col border border-gray-200 shadow rounded-lg p-4 w-96">
                  <dt class="flex items-center gap-x-3 text-base/7 font-semibold text-gray-900">
                    <svg class="size-5 flex-none text-navBackground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                    </svg>
                    Order Details
                  </dt>
                  <dd class="mt-2 flex flex-col text-base/7 text-gray-600">
                    <ul class="pl-6 list-disc">
                        <li class="flex-auto text-gray-500"><span class="text-gray-900 font-semibold">Naam: </span>{{ $user->first_name }} {{ $user->last_name }}</li>
                        <li class="flex-auto text-gray-500"><span class="text-gray-900 font-semibold">Aantal Items: </span>{{ $itemAmount }}
                    </ul>
                  </dd>
                </div>

                <div class="flex flex-col border border-gray-200 shadow rounded-lg p-4 w-96">
                    <dt class="flex items-center gap-x-3 text-base/7 font-semibold text-gray-900">
                      <svg class="size-5 flex-none text-navBackground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>
                      Customer Information
                    </dt>
                    <dd class="mt-2 flex flex-auto flex-col justify-between text-base/7 text-gray-600">
                        <ul class="pl-6 list-disc">
                            <li class="flex-auto text-gray-500"><span class="text-gray-900 font-semibold">Naam: </span>{{ $user->first_name }} {{ $user->last_name }}</li>
                            <li class="flex-auto text-gray-500"><span class="text-gray-900 font-semibold">Email: </span>{{ $user->email }}
                            <li class="flex-auto text-gray-500"><span class="text-gray-900 font-semibold">Telefoon Nummer: </span>{{ $shipping->phone_number }}
                        </ul>
                        <p class="mt-4">
                            <a href="{{ route('profile.edit') }}" class="text-sm/6 font-semibold text-navBackground hover:text-navBackground/80 transition duration-300 ease-in-out">Customer profile settings <span aria-hidden="true">→</span></a>
                        </p>
                    </dd>
                </div>

                <div class="flex flex-col border border-gray-200 shadow rounded-lg p-4 w-96">
                    <dt class="flex items-center gap-x-3 text-base/7 font-semibold text-gray-900">
                        <svg class="size-5 flex-none text-navBackground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                        </svg>
                      Shipping Address
                    </dt>
                    <dd class="mt-2 flex flex-auto flex-col text-base/7 text-gray-600">
                        <ul class="pl-6 list-disc">
                            <li class="flex-auto text-gray-500 mb-2"><span class="text-gray-900 font-semibold">Naam: </span>{{ $user->first_name }} {{ $user->last_name }}</li>
                            <li class="flex-auto text-gray-500"><span class="text-gray-900 font-semibold">Address: </span>{{ $shipping->address }}
                            <li class="flex-auto text-gray-500"><span class="text-gray-900 font-semibold">PostCode: </span>{{ $shipping->postal_code }}
                            <li class="flex-auto text-gray-500"><span class="text-gray-900 font-semibold">Stad: </span>{{ $shipping->city }}
                        </ul>
                        <p class="mt-4">
                            <a href="{{ route('shipping.edit', $order->id) }}" class="text-sm/6 font-semibold text-navBackground hover:text-navBackground/80 transition duration-300 ease-in-out">Edit shipping Settings <span aria-hidden="true">→</span></a>
                        </p>
                    </dd>
                </div>
              </dl>
            </div>
          </div>
        </div>
    </div>
</section>
