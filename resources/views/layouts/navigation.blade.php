<div class="bg-cmsNavBackground">
    <header class="fixed inset-x-0 top-0 z-50 bg-navBackground shadow-lg">
        <nav>
            <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
              <div class="flex h-16 justify-between">
                <div class="flex px-2 lg:px-0">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('home.index')" :active="request()->routeIs('home.*')">
                            {{ __('Home') }}
                        </x-nav-link>

                        <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.*')">
                            {{ __('Contact') }}
                        </x-nav-link>
                    </div>
                </div>
                <div class="relative z-0 flex flex-1 items-center justify-center px-2 sm:inset-0">
                    <div class="grid w-full grid-cols-1 sm:max-w-xs">
                      <input type="search" name="search" class="col-start-1 row-start-1 block w-full rounded-md bg-white py-1.5 pr-3 pl-10 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6" placeholder="Search">
                      <svg class="pointer-events-none col-start-1 row-start-1 ml-3 size-5 self-center text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd" />
                      </svg>
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
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
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
                <div class="hidden lg:ml-4 lg:flex lg:items-center">
                  <div class="hidden sm:flex sm:items-center sm:ms-6">
                    {{-- only show dropdown when user is logged in --}}
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        @if (Auth::check())
                            <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                {{ __('Profiel') }}
                            </x-nav-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-bold leading-5 text-white/70 hover:text-white hover:border-white focus:outline-none focus:text-white focus:border-white transition duration-150 ease-in-out">
                                    {{ __('Log uit') }}
                                </button>
                            </form>

                            {{-- Checks if the user has the right to view the cms --}}
                            @if ($aclService->superUserCheck())
                                <x-nav-link :href="route('cms.dashboard.index')" :active="request()->routeIs('cms.dashboard.index')">
                                    {{ __('CMS') }}
                                </x-nav-link>
                            @endif
                        @else
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                {{ __('Log in') }}
                            </x-nav-link>

                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                {{ __('Regristreer') }}
                            </x-nav-link>
                        @endif
                        <x-nav-link :href="route('basket.index')" :active="request()->routeIs('baske.*')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </x-nav-link>
                    </div>
                </div>
                </div>
              </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="hidden" id="mobile-menu">
              <div class="ml-8 space-y-1 pt-2 pb-3">
                <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800" -->
                <x-responsive-nav-link :href="route('home.index')" :active="request()->routeIs('home.*')">
                    {{ __('Home Pagina') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                    {{ __('Producten') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.*')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
              </div>
            </div>
        </nav>
    </header>
