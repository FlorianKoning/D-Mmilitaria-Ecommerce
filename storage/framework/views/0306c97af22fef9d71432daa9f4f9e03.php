<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['item', 'textSize' => 'sm']));

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

foreach (array_filter((['item', 'textSize' => 'sm']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($functions::hasDiscount($item)): ?>
    <div class="flex flex-row gap-x-1">
        <span class="line-through text-<?php echo e($textSize); ?> text-red-500">€<?php echo e($item->price); ?></span>
        <p class="text-<?php echo e($textSize); ?> text-gray-900">€<?php echo e($item->price - ($item->price / 100 * $item->discount_percentage)); ?></p>
    </div>
<?php else: ?>
    <div class="flex flex-row gap-x-1">
        <p class="text-<?php echo e($textSize); ?> text-gray-900">€<?php echo e($item->price); ?></p>
    </div>
<?php endif; ?><?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/components/discount-price.blade.php ENDPATH**/ ?>