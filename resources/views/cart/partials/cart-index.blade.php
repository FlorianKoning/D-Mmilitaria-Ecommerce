<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Shopping Cart</h1>
      <form method="GET" action="{{ route('checkout.index') }}" class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
        <section aria-labelledby="cart-heading" class="lg:col-span-7">
          <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

          <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">
            @if ($cart != null)
                @foreach ($cart as $item)
                    <li class="flex py-6 sm:py-10">
                        <div class="shrink-0">
                            <img src="{{ $item->main_image }}" alt="{{ $item->name }}" class="size-24 rounded-md object-cover sm:size-48">
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
                                            @if ($item->inventory != 0)
                                                @for ($i = 1; $i <= $item->inventory; $i++)
                                                    <option {{ $item->amount == "$i" ? 'selected' : '' }} value="{{ route('cart.update', [$item->id, $i]) }}">{{ $i }}</option>
                                                @endfor
                                            @else
                                                <option selected value="0">0</option>
                                            @endif
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

        <section aria-labelledby="summary-heading" class="mt-16 w-[350px] rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8 space-y-10 border border-navBackground">
            <!-- Order summary -->
            <div>
                <h2 id="summary-heading" class="text-2xl font-bold text-gray-900 mb-4">Totale Winkelmandje</h2>

                <div class="space-y-4">
                    <div>
                        <div class="flex items-center justify-between">
                            <dt class="text-base text-gray-900">Subtotal</dt>
                            <dd class="text-base font-bold text-gray-900">€{{ (isset($totalPrice)) ? $totalPrice : '0' }}</dd>
                        </div>
                        <p class="text-xs text-gray-500 float-right">(Exclusief verzond kosten)</p>
                    </div>
                    <div class=" flex flex-col border-t border-gray-200 space-y-4 pt-4">
                        <p class="text-xs text-gray-500 float-right">De beschikbare verzendopties worden weergegeven tijdens het afrekenproces, waarbij de bijbehorende verzendkosten automatisch worden berekend.</p>
                    </div>
                </div>
            </div>

            {{-- hidden values --}}
            <input type="hidden" name="paymentValue" value="{{ $totalPrice }}">

            <div>
                <button type="submit" class="w-full rounded-md border border-transparent bg-navBackground px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-navBackground focus:outline-none focus:ring-2 focus:ring-navBackground focus:ring-offset-2 focus:ring-offset-gray-50">DOORGAAN NAAR AFREKENEN</button>
            </div>
        </section>
      </form>
    </div>
</div>


{{-- warning model --}}
<x-cart-warning-modal />
