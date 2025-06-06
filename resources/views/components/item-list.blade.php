@props(['products', 'catagories', 'latestUpdate', 'landCatagories', 'today'])

<div class="">
    <div>
        <div class="hidden relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/25" aria-hidden="true"></div>
            <div class="fixed inset-0 z-40 flex">
                <div
                    class="relative ml-auto flex size-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-6 shadow-xl">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                        <button type="button"
                            class="relative -mr-2 flex size-10 items-center justify-center p-2 text-gray-400 hover:text-gray-500">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Close menu</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        {{-- main display --}}
        <main class="mx-auto max-w-full px-4 lg:max-w-full lg:px-8">
            <div class="flex flex-row w-full justify-between pb-10">
                <div class=" max-w-full">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900"> {{ $_SERVER['REQUEST_URI'] != '/product-archive' ? 'New Products' : 'Product Archive' }}</h1>
                    <p class="flex flex-col lg:flex-row lg:gap-2 w-fit mt-4 text-base text-gray-500 border-b border-gray-400">Latest update: <br class="lg:hi dden"> <span class="text-gray-900 break-words">{{ $latestUpdate }}</span></p>
                </div>

                {{-- product archive link --}}
                <div class="mt-auto">
                    <a class="font-semibold border-b border-gray-400 hover:text-navBackground"
                        href="{{ $_SERVER['REQUEST_URI'] != '/product-archive' ? route('home.archive') : route('home.index') }}">
                        {{ $_SERVER['REQUEST_URI'] != '/product-archive' ? 'Product Archive' : 'New Products' }}
                    </a>
                </div>
            </div>

           {{-- items + filter --}}
           <x-front-page.filter :landCatagories="$landCatagories" :catagories="$catagories" :products="$products" />
        </main>
    </div>
</div>


<script>
    $("#catagorieForm").change(function() {
        $("#catagorieForm").trigger('submit');
    })
</script>
