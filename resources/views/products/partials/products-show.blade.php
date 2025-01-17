{{-- @dd($product) --}}

<section>
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 bg-white p-5 rounded-xl border shadow">
        <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
        <!-- Image gallery -->
        <div class="flex flex-col-reverse">
            <!-- Image selector -->
            <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
            <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                <button id="tabs-1-tab-1" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-indigo-500/50 focus:ring-offset-4" aria-controls="tabs-1-panel-1" role="tab" type="button">
                <span class="sr-only">Angled view</span>
                <span class="absolute inset-0 overflow-hidden rounded-md">
                    <img src="{{ $product->product_image_url }}" alt="" class="size-full object-cover">
                </span>
                <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-transparent ring-offset-2" aria-hidden="true"></span>
                </button>

                <!-- More images... -->
            </div>
            </div>
            <div>
            <!-- Tab panel, show/hide based on tab state. -->
            <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                <img src="{{ $product->product_image_url }}" alt="Angled front view with bag zipped and handles upright." class="aspect-square w-full object-cover sm:rounded-lg">
            </div>

            <!-- More images... -->
            </div>
        </div>

        <!-- Product info -->
        <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>

            <div class="mt-3">
            <h2 class="sr-only">Product information</h2>
            @if ($product->inventory > 0)
                @if ($product->discount_percentage != null)
                    <div class="flex flex-row gap-x-1">
                        <span class="line-through text-xl text-red-500">{{ $product->price }}</span>
                        <p class="text-xl text-gray-900">{{ $product->price - ($product->price / 100 * 15) }}</p>
                    </div>
                @else
                    <div class="flex flex-row gap-x-1">
                        <p class="text-xl text-gray-900">{{ $product->price }}</p>
                    </div>
                @endif
            @endif
            </div>

            <div class="mt-6">
            <h3 class="sr-only">Description</h3>

            <div class="space-y-6 text-base text-gray-700">
                <p>{{ $product->big_desc }}</p>
            </div>
            </div>



            <div class="mt-10">
                <form method="POST" action="{{ route('cart.store', $product->id) }}" class="mt-6">
                    @csrf
                    <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-navBackground px-8 py-3 text-base font-medium text-white hover:bg-navBackground/80 focus:outline-none focus:ring-2 focus:ring-navBackground focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Voeg toe</button>
                </form>

                <button type="button" class="hidden ml-4 flex items-center justify-center rounded-md px-3 py-3 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                    <svg class="size-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                    <span class="sr-only">Add to favorites</span>
                </button>
            </div>

            <section aria-labelledby="details-heading" class="mt-12">
            <h2 id="details-heading" class="sr-only">Additional details</h2>

            <div class="divide-y divide-gray-200 border-t">
                <div>
                <h3>
                    <!-- Expand/collapse question button -->
                    <button onclick="hideLayer('features')" type="button" class="group relative flex w-full items-center justify-between py-6 text-left" aria-controls="disclosure-1" aria-expanded="false">
                    <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                    <span class="text-sm font-medium text-gray-900">Features</span>
                    <span class="ml-6 flex items-center">
                        <!-- Open: "hidden", Closed: "block" -->
                        <svg class="block size-6 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <!-- Open: "block", Closed: "hidden" -->
                        <svg class="hidden size-6 text-indigo-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </span>
                    </button>
                </h3>
                <div class="pb-6" id="features">
                    <ul role="list" class="list-disc space-y-1 pl-5 text-sm/6 text-gray-700 marker:text-gray-300">
                    <li class="pl-2">Multiple strap configurations</li>
                    <li class="pl-2">Spacious interior with top zip</li>
                    <li class="pl-2">Leather handle and tabs</li>
                    <li class="pl-2">Interior dividers</li>
                    <li class="pl-2">Stainless strap loops</li>
                    <li class="pl-2">Double stitched construction</li>
                    <li class="pl-2">Water-resistant</li>
                    </ul>
                </div>
                </div>
            </div>
            </section>
        </div>
        </div>
    </div>
</section>
