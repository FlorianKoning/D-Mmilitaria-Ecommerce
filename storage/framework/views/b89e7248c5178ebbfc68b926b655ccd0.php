<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['cart']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['cart']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<ul role="list" class="divide-y divide-gray-200">
    <?php if($cart != null): ?>
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="flex px-4 py-6 sm:px-6">
                <div class="shrink-0">
                    <img src="<?php echo e($item->main_image); ?>" alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
                </div>

                <div class="ml-6 flex flex-1 flex-col">
                    <div class="flex">
                        <div class="min-w-0 flex-1">
                            <h4 class="text-sm font-medium text-gray-700 hover:text-gray-800"><?php echo e($item->name); ?></h4>
                        </div>
                    </div>
                    <div class="flex flex-1 items-end justify-between pt-2">
                        <p class="mt-1 text-xs font-medium text-gray-500">Hoeveelheid: <?php echo e($item->amount); ?></p>
                    </div>
                    <div class="flex flex-1 items-end justify-between pt-2">
                        <p class="mt-1 text-sm font-medium text-gray-900">€<?php echo e(($item->price * $item->amount)); ?></p>
                    </div>
                </div>
            </li>
            <input type="hidden" name="items[<?php echo e($item->id); ?>]" value="<?php echo e($item->amount); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</ul>
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/components/checkout/item-list.blade.php ENDPATH**/ ?>