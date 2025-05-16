<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['route' => '', 'type' => 'submit']));

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

foreach (array_filter((['route' => '', 'type' => 'submit']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if(strlen($route) > 0): ?>
    <a href="<?php echo e($route); ?>">
        <button <?php echo e($attributes->merge(['type' => $type, 'class' => 'inline-flex items-center px-4 py-2 bg-buttonColor border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-buttonColor/80 focus:bg-buttonColor active:bg-buttonColor focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'])); ?>>
            <?php echo e($slot); ?>

        </button>
    </a>
<?php else: ?>
    <button <?php echo e($attributes->merge(['type' => $type, 'class' => 'inline-flex items-center px-4 py-2 bg-buttonColor border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-buttonColor/80 focus:bg-buttonColor active:bg-buttonColor focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'])); ?>>
        <?php echo e($slot); ?>

    </button>
<?php endif; ?><?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/components/primary-button.blade.php ENDPATH**/ ?>