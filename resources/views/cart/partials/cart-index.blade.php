<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Shopping Cart</h1>
      <form class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
        <section aria-labelledby="cart-heading" class="lg:col-span-7">
          <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

          <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">
            @if ($cart != null)
                @foreach ($cart as $item)
                    <li class="flex py-6 sm:py-10">
                        <div class="shrink-0">
                            <img src="{{ $item->product_image_url }}" alt="{{ $item->name }}" class="size-24 rounded-md object-cover sm:size-48">
                        </div>

                        <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                            <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                <div>
                                    <div class="flex justify-between">
                                        <h3 class="text-sm">
                                        <a href="#" class="font-medium text-gray-700 hover:text-gray-800">{{ $item->name }}</a>
                                        </h3>
                                    </div>
                                    @if (count($cartService::price($item->id)) > 1)
                                        <div class="flex flex-row gap-x-1">
                                            <span class="line-through text-sm text-red-500">{{ $cartService::price($item->id)['oldPrice'] }}</span>
                                            <p class="text-sm text-gray-900">{{ $cartService::price($item->id)['newPrice'] }}</p>
                                        </div>
                                    @else
                                        <div class="flex flex-row gap-x-1">
                                            <p class="text-sm text-gray-900">{{ $cartService::price($item->id)['oldPrice'] }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-4 sm:mt-0 sm:pr-9">
                                    <div class="grid w-full max-w-16 grid-cols-1">
                                        <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" name="quantity-0" aria-label="Quantity, Basic Tee" class="col-start-1 row-start-1 appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-navBackground sm:text-sm/6">
                                            @for ($i = 1; $i <= $item->inventory; $i++)
                                                <option {{ $item->amount == "$i" ? 'selected' : '' }} value="{{ route('cart.update', [$item->id, $i]) }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>


                                    <div class="absolute right-0 top-0">
                                        <button onclick="cartWarning('{{ route('cart.destroy', $item->id) }}', '{{ $item->name }}')" type="button" class="-m-2 inline-flex p-2 text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Remove</span>
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            {{-- in stock --}}
                            @if ($item->inventory > 0)
                                <div class="flex flex-row gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="my-auto size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <p class="text-sm text-gray-900">In vooraad</p>
                                </div>
                            @else
                                <div class="flex flex-row gap-2">
                                    <p class="mt-4 flex space-x-2 text-sm text-gray-700">
                                        <svg class="size-5 shrink-0 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                        </svg>
                                        <span>In stock</span>
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="my-auto size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                    <p class="text-sm text-gray-900">Uit vooraad</p>
                                </div>
                            @endif
                        </div>
                    </li>


                @endforeach
            @endif

          </ul>
        </section>

        <!-- Order summary -->
        <section aria-labelledby="summary-heading" class="mt-16 rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
          <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>

          <dl class="mt-6 space-y-4">
            <div class="flex items-center justify-between">
              <dt class="text-sm text-gray-600">Subtotal</dt>
              <dd class="text-sm font-medium text-gray-900">€{{ (isset($totalPrice)) ? $totalPrice : '0' }}</dd>
            </div>

            @if (isset($totalPrice))
                <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                    <dt class="flex items-center text-sm text-gray-600">
                        <span>Bezorg kosten</span>
                        <a href="#" class="ml-2 shrink-0 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Learn more about how shipping is calculated</span>
                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0ZM8.94 6.94a.75.75 0 1 1-1.061-1.061 3 3 0 1 1 2.871 5.026v.345a.75.75 0 0 1-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 1 0 8.94 6.94ZM10 15a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </dt>
                    <dd class="text-sm font-medium text-gray-900">€5.00</dd>
                </div>
            @endif
            <div class="flex items-center justify-between border-t border-gray-200 pt-4">
              <dt class="text-base font-medium text-gray-900">Totale kosten</dt>
              <dd class="text-base font-medium text-gray-900">€{{ $totalPrice + 5 }}</dd>
            </div>
          </dl>

          <div class="mt-6">
            <button type="submit" class="w-full rounded-md border border-transparent bg-navBackground px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-navBackground focus:outline-none focus:ring-2 focus:ring-navBackground focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</button>
          </div>
        </section>
      </form>
    </div>
</div>


{{-- warning model --}}
<x-cart-warning-modal />
