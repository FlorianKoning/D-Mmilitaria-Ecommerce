<form method="GET" action="#">
    <?php echo csrf_field(); ?>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <h2 class="text-pretty text-xl font-semibold tracking-tight text-navBackground sm:text-2xl mb-1">
                Select the fair where you would like to pick up your order.
            </h2>
            <p class="text-pretty text-sm tracking-tight text-gray-900 sm:text-base mb-1">
                Below you will see all the fairs we will be attending. Pay close attention to the date and location of each event.
                We don’t want to miss each other, of course.
            </p>
            <p class="text-pretty text-sm tracking-tight text-gray-900 sm:text-base mb-1">
                You can select a show simply by clicking on it.
            </p>
        </div>
        <div class="mt-2 flow-root">
          <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <div class="overflow-hidden shadow ring-1 ring-black/5 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <div class="h-16 w-full bg-navBackground sm:rounded-t-lg px-5">
                        <div class="flex flex-row gap-6">
                            <div class="flex flex-row gap-2">
                                <input type="text" name="search" id="search" class="mt-4 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 sm:text-sm/6">
                                <button type="submit" class="mt-4 inline-flex items-center gap-x-1.5 rounded-md bg-gray-400 px-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 cursor-pointer">
                                    Search
                                </button>
                                <?php if(isset($_GET['search'])): ?>
                                    <a href="<?php echo e(route('exhibition.index')); ?>" class="mt-4 inline-flex items-center gap-x-1.5 rounded-md bg-gray-400 px-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 cursor-pointer">
                                        <button type="button">
                                            Clear
                                        </button>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <thead class="bg-navBackground h-9">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Beurs Naam</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Beurs Locatie</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Beurs Datum</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Beurs Openings Tijd</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Beurs Sluitings Tijd</th>
                        </tr>
                    </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                    <?php $__currentLoopData = $exhibitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exhibition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr onclick="window.location='<?php echo e(route('fairPickUp.choicePayment', [$exhibition->id, $order->id])); ?>'" class="even:bg-gray-50 hover:bg-sky-400 cursor-pointer transition duration-300 ease-in-out">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?php echo e($exhibition->exhibition_name); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo e($exhibition->exhibition_location); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo e($exhibition->exhibition_date); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo e($exhibition->exhibition_opening_time); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo e($exhibition->exhibition_closing_time); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</form>
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/payments/partials/fairPickUp.blade.php ENDPATH**/ ?>