<div>
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-0 lg:flex lg:w-56 lg:flex-col">
      <div class="flex grow flex-col overflow-y-auto bg-cmsNavBackground pb-4">
        <div class="flex flex-row justify-center items-center gap-x-5 h-16 border-b bg-logoBackground">
          <h1 class="text-white font-extrabold text-xl">CMS Dashboard</h1>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </div>
        <nav class="flex flex-1 flex-col border-r">
            <ul role="list" class="flex flex-1 flex-col gap-y-3">
                {{-- Website overview --}}
                <div class="flex flex-row justify-between text-black py-2 border-[#DBDBDB] border-t border-b">
                    <div class="px-6">
                        <h3 class="font-extrabold text-sm">Website Overivew</h3>
                    </div>
                </div>
                <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <x-cms-nav-link :href="route('cms.dashboard.index')" :active="request()->routeIs('cms.dashboard.index')">
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                                Dashboard
                            </div>
                        </x-cms-nav-link>
                    </ul>
                </li>


                {{-- website management --}}
                <div class="flex flex-row justify-between text-black py-2 border-[#DBDBDB] border-t border-b">
                    <div class="px-6">
                        <h3 class="font-bold text-sm">Management</h3>
                    </div>
                </div>
                <li class="px-6">
                    <ul id="management" role="list" class="-mx-2 space-y-1">
                        <div>
                            <x-cms-nav-link :href="route('cms.products.index')" :active="request()->routeIs('cms.products.*')">
                                <div class="flex flex-row gap-x-3 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>
                                    Producten
                                </div>
                            </x-cms-nav-link>
                        </div>
                    </ul>
                </li>
                <li class="px-6">
                    <ul id="management" role="list" class="-mx-2 space-y-1">
                        <div>
                            <x-cms-nav-link :href="route('cms.catagories.index')" :active="request()->routeIs('cms.catagories.*')">
                                <div class="flex flex-row gap-x-3 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    Catagorien
                                </div>
                            </x-cms-nav-link>
                        </div>
                    </ul>
                </li>



                {{-- Payments and orders --}}
                <div class="flex flex-row justify-between text-black py-2 border-[#DBDBDB] border-t border-b">
                    <div class="px-6">
                        <h3 class="font-extrabold text-sm">Payments and orders</h3>
                    </div>
                </div>
                <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <x-cms-nav-link :href="route('cms.orders.index')" :active="request()->routeIs('cms.orders.*')">
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                Orders
                            </div>
                        </x-cms-nav-link>
                    </ul>
                </li>
                <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <x-cms-nav-link :href="route('cms.order-statuses.index')" :active="request()->routeIs('cms.order-statuses.*')">
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                Order Statuses
                            </div>
                        </x-cms-nav-link>
                    </ul>
                </li>



                {{-- bottom navigation --}}
                <li class="mt-auto mx-auto">
                    <x-cms-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')">
                        <div class="flex flex-row gap-x-3 px-6">
                            <svg class="size-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Settings
                        </div>
                    </x-cms-nav-link>

                    <x-cms-nav-link :href="route('home.index')">
                        <div class="flex flex-row gap-x-3 px-6">
                            <svg class="size-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            Website
                        </div>
                    </x-cms-nav-link>
                </li>
            </ul>
        </nav>
      </div>
    </div>

    <div class="lg:pl-56">
      <div class="fixed w-full z-0 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8 bg-[#3C8DBC] text-white">
        <div class="flex flex-row justify-between">
            {{-- header title --}}
            @isset($header)
                <header>{{ $header }}</header>
            @endisset
        </div>
      </div>


