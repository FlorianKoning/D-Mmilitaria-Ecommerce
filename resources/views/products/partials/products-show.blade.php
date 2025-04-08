<section>
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 bg-white p-5 rounded-xl border shadow">
        <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
        <!-- Image gallery -->
        <div class="flex flex-col-reverse">
            <!-- Image selector -->
            <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
                <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                    <button id="tabs-1-tab-1" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-navBackground focus:ring-offset-4" aria-controls="tabs-1-panel-1" role="tab" type="button">
                        <span class="sr-only">Angled view</span>
                        <span class="absolute inset-0 overflow-hidden rounded-md">
                            <img onclick="changeImage($(this).attr('src'))" src="{{ $product->main_image }}" alt="" class="size-full object-cover">
                        </span>
                        <!-- Selected: "ring-navBackgroundNot Selected: "ring-transparent" -->
                        <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-transparent ring-offset-2" aria-hidden="true"></span>
                    </button>

                    {{-- extra images --}}
                    @foreach ($extraImages as $image)
                        <button id="tabs-1-tab-1" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-navBackground focus:ring-offset-4" aria-controls="tabs-1-panel-1" role="tab" type="button">
                            <span class="sr-only">Angled view</span>
                            <span class="absolute inset-0 overflow-hidden rounded-md">
                                <img onclick="changeImage($(this).attr('src'))" src="{{ $image->image_url }}" alt="{{ $image->image_name }}" class="size-full object-cover">
                            </span>
                            <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                            <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-transparent ring-offset-2" aria-hidden="true"></span>
                        </button>
                    @endforeach
                </div>
            </div>

            <div>
            <!-- Tab panel, show/hide based on tab state. -->
            <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                <img id="mainImage" src="{{ $product->main_image }}" alt="Angled front view with bag zipped and handles upright." class="aspect-square w-full object-cover sm:rounded-lg">
            </div>

            <!-- More images... -->
            </div>
        </div>

        <!-- Product info -->
        <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
            {{-- title --}}
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>


            {{-- price --}}
            <div class="mt-3">
                <h2 class="sr-only">Product information</h2>
                @if ($product->inventory > 0)
                    @if ($product->discount_percentage != null)
                        <div class="flex flex-row gap-x-1">
                            <span class="line-through text-xl text-red-500">€{{ $product->price }}</span>
                            <p class="text-xl text-gray-900">€{{ $product->price - ($product->price / 100 * 15) }}</p>
                        </div>
                    @else
                        <div class="flex flex-row gap-x-1">
                            <p class="text-xl text-gray-900">€{{ $product->price }}</p>
                        </div>
                    @endif
                @endif
            </div>


            {{-- amount in stock --}}
            <div class="mt-3">
                <div class="flex flex-row gap-x-1">
                    <p class="text-sm font-medium text-gray-900">Hoeveelheid in verkoop: {{ $product->inventory }}</p>
                </div>
            </div>


            {{-- description --}}
            <div class="mt-6">
                <h3 class="sr-only">Description</h3>

                <div class="space-y-6 text-base text-gray-700">
                    <p>{{ $product->big_desc }}</p>
                </div>
            </div>


            <div class="mt-10">
                @if ($product->inventory != 0)
                    <form method="POST" action="{{ route('cart.store', $product->id) }}" class="mt-6">
                        @csrf
                        <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-navBackground px-8 py-3 text-base font-medium text-white hover:bg-navBackground/80 focus:outline-none focus:ring-2 focus:ring-navBackground focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Voeg toe</button>
                    </form>
                @endif

                <button type="button" class="hidden ml-4 flex items-center justify-center rounded-md px-3 py-3 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                    <svg class="size-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                    <span class="sr-only">Add to favorites</span>
                </button>
            </div>
        </div>
        </div>
    </div>
</section>
