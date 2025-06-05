

<div class="mx-auto max-w-full sm:px-2 lg:px-8">
    <div class="mx-auto max-w-full space-y-8 sm:px-4 lg:px-0">
        <?php if(count($orders) > 0): ?>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $shipping = $shippingRepository->findWithOrder($order);
                ?>

                <div class="border-b border-t border-gray-200 bg-white shadow-sm sm:rounded-lg sm:border">
                    <div class="flex items-center border-b border-gray-200 p-4 sm:grid sm:grid-cols-4 sm:gap-x-6 sm:p-6">
                        <dl class="grid flex-1 grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-4 lg:col-span-2">
                            <div>
                                <dt class="font-medium text-gray-900">Bestellings Nummer</dt>
                                <dd class="mt-1 text-gray-500"><?php echo e($order->order_number); ?></dd>
                            </div>
                            <div class="hidden sm:block">
                                <dt class="font-medium text-gray-900">Bestelling gemaakt op</dt>
                                <dd class="mt-1 text-gray-500">
                                    <time datetime="2021-07-06"><?php echo e($order->created_at); ?></time>
                                </dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-900">Bestel bedrag</dt>
                                <dd class="mt-1 font-medium text-gray-900">€<?php echo e($order->payment_amount); ?></dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-900">Bestelling Status</dt>
                                <dd class="mt-1 font-medium text-gray-900">
                                    <button type="button" class="rounded <?php echo e($orderStatusColor[$orderStatusRepository->find($order->order_status_id)['status']]); ?> px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        <?php echo e($orderStatusRepository->find($order->order_status_id)['status']); ?>

                                    </button>
                                </dd>
                            </div>
                        </dl>

                        <div class="relative flex justify-end lg:hidden">
                            <div class="absolute right-0 z-10 mt-2 w-40 origin-bottom-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-1">Invoice</a>
                                </div>
                            </div>
                        </div>

                        
                        <div class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">
                            <a href="<?php echo e(route('download.invoice', $order->id)); ?>" class="flex items-center justify-center rounded-md border border-gray-300 bg-white px-2.5 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span>Download Factuur</span>
                            </a>

                            <?php if(in_array($order->order_status_id, $shippingStatusArray)): ?>
                                <a href="<?php echo e(route('shipping.edit', [$order->id, $shipping->id])); ?>" class="flex items-center justify-center rounded-md border border-gray-300 bg-white px-2.5 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span>Verzending Details</span>
                                </a>    
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Products -->
                    <ul role="list" class="divide-y divide-gray-200">
                        <?php $__currentLoopData = json_decode($order->order_items); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $product = $productModel::find($item->id);
                            ?>

                            <li class="p-4 sm:p-6">
                                <div class="flex items-center sm:items-start">
                                    <div class="size-20 shrink-0 overflow-hidden rounded-lg bg-gray-200 sm:size-40">
                                        <img src="<?php echo e($product['main_image']); ?>" alt="Moss green canvas compact backpack with double top zipper, zipper front pouch, and matching carry handle and backpack straps." class="size-full object-cover">
                                    </div>
                                    <div class="ml-6 flex-1 text-sm">
                                        <div class="font-medium text-gray-900 sm:flex sm:justify-between">
                                            <h5 class="font-semibold"><?php echo e($product['name']); ?></h5>
                                            <p class="mt-2 sm:mt-0">€<?php echo e($product['price']); ?></p>
                                        </div>
                                        <p class="hidden text-gray-500 sm:mt-2 sm:block"><?php echo e($product['big_desc']); ?></p>
                                    </div>
                                </div>

                                <div class="mt-6 sm:flex sm:justify-between lg:justify-end">
                                    <div class="mt-6 flex items-center divide-x divide-gray-200 border-t border-gray-200 pt-4 text-sm font-medium sm:ml-4 sm:mt-0 sm:border-none sm:pt-0">
                                        <div class="flex flex-1 justify-center pr-4">
                                            <a href="<?php echo e(route('products.show', $product['id'])); ?>" class="whitespace-nowrap text-sky-600 hover:text-sky-500">View product</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <h1 class="text-2xl font-semibold text-center">U heeft nog geen bestellingen!</h1>
        <?php endif; ?>
    </div>
</div>


<div class="bg-blue-600 bg-sky-500 bg-amber-500 bg-purple-500 bg-yellow-300 bg-red-600 bg-emerald-400"></div>
<?php /**PATH C:\wamp64\www\dbmMilitaria\resources\views/profile/partials/orders.blade.php ENDPATH**/ ?>