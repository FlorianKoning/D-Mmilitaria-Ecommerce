<section>
    <div class="mx-auto max-w-2xl px-4 py-18 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 bg-white p-5 rounded-xl border shadow">
        <div class="flex flex-col lg:flex-row w-full gap-2">

            <!-- Image gallery -->
            <div class="w-2/3 flex flex-col-reverse">
                <!-- Image selector -->
                <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
                    <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                        <button id="tabs-1-tab-1" class="relative flex h-40 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-navBackground focus:ring-offset-4" aria-controls="tabs-1-panel-1" role="tab" type="button">
                            <span class="absolute inset-0 overflow-hidden rounded-md">
                                <img onclick="changeImage($(this).attr('src'))" src="{{ $product->main_image }}" alt="" class="size-full object-cover">
                            </span>
                            <!-- Selected: "ring-navBackgroundNot Selected: "ring-transparent" -->
                            <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-transparent ring-offset-2" aria-hidden="true"></span>
                        </button>

                        {{-- extra images --}}
                        @foreach ($extraImages as $image)
                            <button id="tabs-1-tab-1" class="relative flex h-40 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-navBackground focus:ring-offset-4" aria-controls="tabs-1-panel-1" role="tab" type="button">
                                <span class="absolute inset-0 overflow-hidden rounded-md">
                                    <img onclick="changeImage($(this).attr('src'), '{{ $image->order }}')" src="{{ $image->image_url }}" alt="{{ $image->image_name }}" class="w-full h-full object-contain">
                                </span>
                                <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-transparent ring-offset-2" aria-hidden="true"></span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <div>
                    <!-- Tab panel, show/hide based on tab state. -->
                    <div class="flex items-center select-none" id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                        <div onclick="imageArray('left', '{{ $product->id }}')" class="hover:text-navBackground hover:cursor-pointer p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </div>
    
                        <img onclick="toogleZoom()" id="mainImage" src="{{ $product->main_image }}" alt="{{ $product->description }}" class="w-3/4  object-cover sm:rounded-lg hover:cursor-pointer">
    
                        <div onclick="imageArray('right', '{{ $product->id }}')" class="hover:text-navBackground hover:cursor-pointer p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
    
                    <!-- More images... -->
                </div>
            </div>

            <!-- Product info -->
            <div class="w-full lg:w-1/3 mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                {{-- title --}}
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>


                {{-- price --}}
                <div class="mt-3">
                    <h2 class="sr-only">Product information</h2>
                    @if ($product->inventory > 0)
                        <x-discount-price :item="$product" :textSize="__('xl')" />
                    @endif
                </div>


                {{-- amount in stock --}}
                @if ($product->show_quantity)
                    <div class="mt-3">
                        <div class="flex flex-row gap-x-1">
                            <p class="text-sm font-medium text-gray-900">qnt: {{ $product->inventory }}</p>
                        </div>
                    </div>
                @endif


                {{-- description --}}
                <div class="mt-6">
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6 text-base text-gray-700">
                        <p>{!! nl2br($product->big_desc) !!}</p>
                    </div>
                </div>


                <div class="mt-10">
                    @if ($product->inventory > 0)
                        <form method="POST" action="{{ route('cart.store', $product->id) }}" class="mt-6">
                            @csrf
                            <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-navBackground px-8 py-3 text-base font-medium text-white hover:bg-navBackground/80 focus:outline-none focus:ring-2 focus:ring-navBackground focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Add to cart</button>
                        </form>
                    @else
                        <button type="button" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-navBackground px-8 py-3 text-base font-medium text-white sm:w-full cursor-not-allowed">Product Uitverkocht</button>
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

<input id="key" type="hidden" value="{{ 0 }}">

{{-- image overlay --}}
<div id="zoomedOverlay" class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 hidden">
  <img src="" alt="Zoomed image" class="max-w-4xl max-h-[90vh] object-contain cursor-zoom-out" id="zoomedImage"/>
</div>



<script>
    const zoomedOverlay = document.getElementById('zoomedOverlay');
    const zoomedImage = document.getElementById('zoomedImage');

    function toogleZoom() {
        let imageUrl = document.getElementById('mainImage').getAttribute('src');
        zoomedImage.setAttribute('src', imageUrl);

        zoomedOverlay.classList.remove('hidden');
    }

    // Makes the zoomed image hidden again.
    zoomedOverlay.addEventListener('click', function() {
        zoomedOverlay.classList.add('hidden');
    });
</script>
