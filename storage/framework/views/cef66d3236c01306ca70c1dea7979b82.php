<form method="GET" action="<?php echo e(route('exhibition.index')); ?>">
    <?php echo csrf_field(); ?>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <h2 class="text-pretty text-xl font-semibold tracking-tight text-navBackground sm:text-2xl mb-1">Alle aankomende beursen die geplanned zijn.</h2>

            <p class="text-pretty text-sm tracking-tight text-gray-900 sm:text-base mb-1">Hier heeft u een overzicht van alle beursen waar ik aanwezig zal zijn.</p>
            <p class="text-pretty text-sm tracking-tight text-gray-900 sm:text-base">
                Heeft u nog bepaalde vragen over een beurs? Neem dan gerust contact met ons op via de
                <a class="border-navBackground text-navBackground font-semibold hover:border-b-2" href="<?php echo e(route('contact.index')); ?>">contact</a> pagina.<br>
                Of u zelf contact opnemen via ons email address: <span class="font-semibold"><?php echo e($business->business_email); ?></span>
            </p>
        </div>
        <div class="mt-8 flow-root">
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
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Aanwezigheid</th>
                        </tr>
                    </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                    <?php $__currentLoopData = $exhibitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exhibition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?php echo e($exhibition->exhibition_name); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo e($exhibition->exhibition_location); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo e($exhibition->exhibition_date); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo e($exhibition->exhibition_opening_time); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo e($exhibition->exhibition_closing_time); ?></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <?php if($exhibition->present == 1): ?>
                                    <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 cursor-pointer">
                                        <svg class="-ml-0.5 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                        </svg>
                                        Aanwezig
                                    </button>
                                <?php else: ?>
                                    <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fizll="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        Niet Aanwezig
                                    </button>
                                <?php endif; ?>
                            </td>
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
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/exhibition/partials/index.blade.php ENDPATH**/ ?>