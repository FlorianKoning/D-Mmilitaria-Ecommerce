<section class="w-full">
    <div class="flex flex-col">
        <h2 class="text-pretty text-xl font-semibold tracking-tight text-navBackground sm:text-2xl mb-1">Payment Method</h2>
        <p class="text-pretty text-sm tracking-tight text-gray-900 sm:text-base mb-1">
            Here you can see the available payment options so you can collect your order at a trade show.
        </p>
    </div>
    <div class="flex flex-row justify-between items-center gap-10">
        
        <form id="bankTransfer" method="POST" action="<?php echo e(route('fairPickUp.payment', [$exhibition->id, $order->id, 1])); ?>" class="w-full h-full">
            <?php echo csrf_field(); ?>

            <div class="flex flex-col bg-gray-500 justify-y-8 w-full mt-12 h-20 rounded-lg hover:bg-gray-500/95 hover:cursor-pointer shadow">
                <div class="flex flex-row w-full h-full p-6">
                    <div class="flex-1 flex flex-col justify-center">
                        <div class="flex flex-row gap-2">
                            <h3 class="text-white text-sm font-medium">Banktransfer</h3>
                            <svg class="text-white size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex flex-col justify-center">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px"
                                viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"
                                fill="#ffffff" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier" opacity="1">
                                <g>
                                <circle fill="#ffffff" cx="32" cy="14" r="3"></circle>
                                <path fill="#ffffff" d="M4,25h56c1.794,0,3.368-1.194,3.852-2.922c0.484-1.728-0.242-3.566-1.775-4.497l-28-17
                                    C33.438,0.193,32.719,0,32,0s-1.438,0.193-2.076,0.581l-28,17c-1.533,0.931-2.26,2.77-1.775,4.497
                                    C0.632,23.806,2.206,25,4,25z M32,9c2.762,0,5,2.238,5,5s-2.238,5-5,5s-5-2.238-5-5S29.238,9,32,9z"></path>
                                <rect x="34" y="27" fill="#ffffff" width="8" height="25"></rect>
                                <rect x="46" y="27" fill="#ffffff" width="8" height="25"></rect>
                                <rect x="22" y="27" fill="#ffffff" width="8" height="25"></rect>
                                <rect x="10" y="27" fill="#ffffff" width="8" height="25"></rect>
                                <path fill="#ffffff" d="M4,58h56c0-2.209-1.791-4-4-4H8C5.791,54,4,55.791,4,58z"></path>
                                <path fill="#ffffff" d="M63.445,60H0.555C0.211,60.591,0,61.268,0,62v2h64v-2C64,61.268,63.789,60.591,63.445,60z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </form>



        
        
    </div>
</section>


<script>
    const bankTransfer = document.getElementById("bankTransfer");
    const molli = document.getElementById("molli");

    bankTransfer.addEventListener('click', function() {
        bankTransfer.submit();
    });

    molli.addEventListener('click', function() {
        molli.submit();
    });
</script><?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/payments/partials/fair-pickup-payment.blade.php ENDPATH**/ ?>