<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['paymentValue']));

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

foreach (array_filter((['paymentValue']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<dl class="space-y-6 border-t border-gray-200 px-4 py-6 sm:px-6">
    <div class="flex items-center justify-between">
        <dt class="text-sm">Subtotal</dt>
        <div class="flex flex-row">
            <dd class="text-sm font-medium text-gray-900">€</dd>
            <dd id="subtotal" class="text-sm font-medium text-gray-900"><?php echo e((isset($paymentValue)) ? $paymentValue : session('totalPrice')); ?></dd>
        </div>
        <input id="inputSubtotal" type="hidden" value="<?php echo e($paymentValue); ?>">
    </div>
    <div id="shippingCost" class="flex items-center justify-between">
        <dt class="text-sm">Shipping Cost</dt>
        <div class="flex flex-row">
           <dd class="text-sm font-medium text-gray-900">€</dd>
           <dd id="shippingAmount" class="text-sm font-medium text-gray-900">5.00</dd>
        </div>
    </div>
    <div class="border-t border-gray-200 pt-4">
        <div class="flex items-center justify-between">
            <dt class="text-base font-medium text-gray-900">Total</dt>
            <div class="flex flex-row">
                <dd class="text-base font-bold text-gray-900">€</dd>
                <dd id="total" class="text-base font-bold text-gray-900"><?php echo e($paymentValue); ?></dd>
            </div>
        </div>
        <input id="inputPayment" name="paymentAmount" type="hidden" value="<?php echo e($paymentValue); ?>">
        <p class="text-xs text-gray-500 float-right">(Extra service cost with Mollie)</p>
    </div>
</dl>
<?php /**PATH C:\wamp64\www\dbmMilitaria\resources\views/components/checkout/checkout-cost.blade.php ENDPATH**/ ?>