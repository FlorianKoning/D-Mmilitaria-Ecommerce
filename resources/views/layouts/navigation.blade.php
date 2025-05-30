<div class="bg-cmsNavBackground">
    <header class="fixed inset-x-0 top-0 z-50 bg-navBackground shadow-lg">
        <nav>
            <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">

              <div class="flex h-16 justify-between content-center">

                <div class="flex px-2 lg:px-0">
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                        <div class="flex shrink-0 items-center">
                            <img class="h-8 w-auto" src="{{ $business->business_logo }}" alt="Your Company">
                        </div>
                        <x-nav-link :href="route('home.index')" :active="request()->routeIs('home.*')">
                            {{ __('Home') }}
                        </x-nav-link>

                        <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.*')">
                            {{ __('Contact') }}
                        </x-nav-link>

                        <x-nav-link :href="route('exhibition.index')" :active="request()->routeIs('exhibition.*')">
                            {{ __('Fairs/Beurzen') }}
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
                <div class="hidden lg:ml-4 lg:flex lg:items-center">
                  <div class="hidden sm:flex sm:items-center sm:ms-6">
                    {{-- only show dropdown when user is logged in --}}
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        @if (Auth::check())
                            <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                {{ __('Profile') }}
                            </x-nav-link>

                            {{-- Checks if the user has the right to view the cms --}}
                            @if ($aclService->superUserCheck())
                                <x-nav-link :href="route('cms.dashboard.index')" :active="request()->routeIs('cms.dashboard.index')">
                                    {{ __('CMS') }}
                                </x-nav-link>
                            @endif

                            <form method="POST" action="{{ route('logout') }}" class="flex">
                                @csrf

                                <button type="submit" class="flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-bold text-white/70 hover:text-white hover:border-white focus:text-white focus:border-white transition duration-150 ease-in-out">
                                    {{ __('Log out') }}
                                </button>
                            </form>
                        @else
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                {{ __('Log in') }}
                            </x-nav-link>

                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                {{ __('Register') }}
                            </x-nav-link>
                        @endif


                        <div class="flex flex-row justify-center">
                            <button onclick="flexHideLayer('cartLayer')" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-bold leading-5 text-white/70 hover:text-white hover:border-white focus:outline-none focus:text-white focus:border-white transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                            </button>
                            <div id="cartLayer" class="hidden flex-col fixed justify-between mt-12 w-[400px] h-[380px] bg-white rounded-md border shadow-lg">
                                <div class="flex flex-col space-y-6 w-[400px] h-[400px] overflow-y-scroll">
                                    @if ($cart != null)
                                        @foreach ($cart as $item)
                                            {{-- @dd($item) --}}
                                            <div class="flex flex-row my-2 border-b border-gray-600">
                                                {{-- image block --}}
                                                <div class="shrink-0 mx-3">
                                                    <img src="{{ $item->main_image }}" alt="{{ $item->name }}" class="size-16 rounded-md object-cover">
                                                </div>

                                                {{-- text box --}}
                                                <div class="max-w-full flex flex-col justify-between w-[200px]">
                                                    <h4 class="font-bold">{{ $item->name }}</h4>
                                                    <div class="flex flex-row justify-between">
                                                        <p class="text-sm">Hoeveelheid: {{ $item->amount }}</p>
                                                        <x-discount-price :item="$item" :textSize="__('xs')" />
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                {{-- View cart button --}}
                                <a href="{{ route('cart.index') }}">
                                    <button type="submit" class="max-w-full items-center justify-center rounded-md border border-transparent bg-navBackground px-8 py-3 text-base font-medium text-white hover:bg-navBackground/80 focus:outline-none focus:ring-2 focus:ring-navBackground focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">
                                        View Cart
                                    </button>
                                </a>
                            </div>


                            @if ($cartAmount != 0)
                                <p class="text-white mb-4 bg-black px-2 rounded-full">{{ $cartAmount }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                </div>
              </div>
            </div>



            <!-- Mobile menu, show/hide based on menu state. -->
            <div id="phoneNav" class="hidden" id="mobile-menu">
              <div class="ml-8 space-y-1 pt-2 pb-3">
                <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800" -->
                <x-responsive-nav-link :href="route('home.index')" :active="request()->routeIs('home.*')">
                    {{ __('Home Pagina') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.*')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('Profiel') }}
                </x-responsive-nav-link>


                {{-- Checks if the user is logged in --}}
                @if (Auth::check())
                    {{-- Checks if the user has the right to view the cms --}}
                    @if ($aclService->superUserCheck())
                        <x-responsive-nav-link :href="route('cms.dashboard.index')" :active="request()->routeIs('cms.dashboard.index')">
                            {{ __('CMS') }}
                        </x-responsive-nav-link>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="flex">
                        @csrf

                        <button type="submit" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-300 hover:text-white hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                {{ __('Log uit') }}
                        </button>
                    </form>
                @else
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Regristreer') }}
                    </x-responsive-nav-link>
                @endif
              </div>
            </div>
        </nav>
    </header>

