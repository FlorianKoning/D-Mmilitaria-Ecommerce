<nav class="bg-navBackground shadow-lg">
    <div class="mx-auto max-w-full px-2 sm:px-4 lg:px-8">
        <div class="flex h-16 justify-center content-center">
        <div class="flex px-2 lg:px-0">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('General') }}
                </x-nav-link>

                <x-nav-link :href="route('profile.shipping')" :active="request()->routeIs('profile.shipping')">
                    {{ __('Verzending') }}
                </x-nav-link>

                <x-nav-link :href="route('profile.orders')" :active="request()->routeIs('profile.orders')">
                    {{ __('Bestellingen') }}
                </x-nav-link>
            </div>
        </div>
            <div class="flex items-center lg:hidden">
                <!-- Mobile menu button -->
                <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="-inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
                        Icon when menu is closed.

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg onclick="hideLayer('phoneNav')" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
                        Icon when menu is open.

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>



    <!-- Mobile menu, show/hide based on menu state. -->
    <div id="phoneNav" class="hidden" id="mobile-menu">
        <div class="ml-8 space-y-1 pt-2 pb-3">
            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                {{ __('Profiel') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
