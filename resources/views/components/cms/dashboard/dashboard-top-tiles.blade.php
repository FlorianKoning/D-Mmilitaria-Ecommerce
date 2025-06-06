@props(['orders', 'customers'])

<div class="py-12">
    <div class="w-full h-full grid grid-cols-3 gap-y-3 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8">
        {{-- total sales --}}
        <div class="w-full sm:px-6 lg:px-8 space-y-6">
            <div id="firstParent" class="p-8 h-40 bg-white hover:bg-logoBackground hover:text-white shadow rounded-2xl transition duration-300 ease-in-out">
                <div class="h-full w-full flex flex-col justify-between">

                    {{-- title --}}
                    <div class="flex flex-row justify-between gap-4">
                        <div class="flex flex-row gap-4">
                            <div id="firstTitleChild" class="flex bg-[#E6E6E6] text-logoBackground p-4 rounded-2xl transition duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                                    <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                                </svg>
                            </div>

                            <div class="flex flex-col gap-1">
                                <h2 class="my-auto text-xl font-semibold">Aantal Sales</h2>
                                <a href="{{ route('cms.orders.index', ['option' => 'thisWeek']) }}">
                                    <p id="orderAmount" class="tetx-xs text-[#696A6C] hover:text-white hover:underline font-semibold transition duration-300 ease-in-out">{{ $orders->ordersThisWeek }} Bestellingen</p>
                                </a>
                            </div>
                        </div>
                        
                        <a id="orders" href="{{ route('cms.orders.index') }}">
                            <svg id="orderPreRedirect" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>  

                            <svg id="orderRedirect" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </div>

                    {{-- info --}}
                    <div class="w-full flex flex-row justify-between">
                        <div class="flex flex-row gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>

                            <p class="tetx-xs font-semibold">{{ $orders->percentage }}%</p>
                        </div>

                        <div class="flex flex-row gap-2">
                            <p class="tetx-xs font-semibold">+{{ $orders->profit }}</p>
                            <p id="orderAmount" class="tetx-xs text-[#696A6C] font-semibold">winst gemaakt</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full sm:px-6 lg:px-8 space-y-6">
            <div id="secondParent" class="p-8 h-40 bg-white hover:bg-logoBackground hover:text-white shadow rounded-2xl transition duration-300 ease-in-out">
                <div class="h-full w-full flex flex-col justify-between">
                    
                    {{-- title --}}
                    <div class="flex flex-row justify-between gap-4">
                        <div class="flex flex-row gap-4">
                            <div id="secondTitleChild" class="flex bg-[#E6E6E6] text-logoBackground p-4 rounded-2xl transition duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                                </svg>
                            </div>

                            <div class="flex flex-col gap-1">
                                <h2 class="my-auto text-xl font-semibold">Nieuwe klanten</h2>
                                <a href="{{ route('cms.users.index', ['option' => 'thisWeek']) }}">
                                    <p id="orderAmount" class="tetx-xs text-[#696A6C] hover:text-white hover:underline font-semibold transition duration-300 ease-in-out">
                                        {{ $customers->newCustomers }} Nieuwe klanten
                                    </p>
                                </a>
                            </div>
                        </div>
                        
                        <a id="users" href="{{ route('cms.orders.index') }}">
                            <svg id="userPreRedirect" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>  

                            <svg id="userRedirect" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </div>

                    {{-- info --}}
                    <div class="w-full flex flex-row justify-between">
                        <div class="flex flex-row gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>

                            <p class="tetx-xs font-semibold">{{ $customers->percentage }}%</p>
                        </div>

                        <div class="flex flex-row gap-2">
                            <p class="tetx-xs font-semibold">{{ $customers->total }}</p>
                            <p id="orderAmount" class="text-base my-auto text-[#696A6C] font-bold">Accounts/Gebruikers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 h-40 bg-white hover:bg-logoBackground shadow rounded-2xl cursor-pointer transition duration-300 ease-in-out">
                <div class="flex flex-col justify-between">
                    {{-- title --}}
                    <div class="flex flex-row">
                    </div>

                    {{-- amount --}}
                    <div class="flex flex-row">
                    </div>

                    {{-- info --}}
                    <div class="flex flex-row">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // First tile
    const firstParent = document.getElementById('firstParent');
    const firstTitleChild = document.getElementById('firstTitleChild');
    const ordersRedirect = document.getElementById('orders');

    firstParent.addEventListener('mouseenter', function() {
        firstTitleChild.style.backgroundColor = '#464749';
        firstTitleChild.style.color = 'white';
    })

    firstParent.addEventListener('mouseleave', function() {
        firstTitleChild.style.backgroundColor = '#E6E6E6';
        firstTitleChild.style.color = '#17191e';
    })

    ordersRedirect.addEventListener('mouseenter', function() {
        document.getElementById('orderPreRedirect').classList.add("hidden");
        document.getElementById('orderRedirect').classList.remove("hidden");
    });

    ordersRedirect.addEventListener('mouseleave', function() {
        document.getElementById('orderPreRedirect').classList.remove("hidden");
        document.getElementById('orderRedirect').classList.add("hidden");
    });


    // Second tile
    const secondParent = document.getElementById('secondParent');
    const secondTitleChild = document.getElementById('secondTitleChild');
    const usersRedirect = document.getElementById('users');

    secondParent.addEventListener('mouseenter', function() {
        secondTitleChild.style.backgroundColor = '#464749';
        secondTitleChild.style.color = 'white';
    })

    secondParent.addEventListener('mouseleave', function() {
        secondTitleChild.style.backgroundColor = '#E6E6E6';
        secondTitleChild.style.color = '#17191e';
    })

    usersRedirect.addEventListener('mouseenter', function() {
        document.getElementById('userPreRedirect').classList.add("hidden");
        document.getElementById('userRedirect').classList.remove("hidden");
    });

    usersRedirect.addEventListener('mouseleave', function() {
        document.getElementById('userPreRedirect').classList.remove("hidden");
        document.getElementById('userRedirect').classList.add("hidden");
    });
</script>