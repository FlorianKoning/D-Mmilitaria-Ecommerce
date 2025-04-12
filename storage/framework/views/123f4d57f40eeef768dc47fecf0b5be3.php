<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['paymentValue', 'cart', 'paymentOptions', 'paymentOptionTranslation']));

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

foreach (array_filter((['paymentValue', 'cart', 'paymentOptions', 'paymentOptionTranslation']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="mt-10 mx-auto lg:mt-0">
    <h2 class="text-lg font-medium text-gray-900">Uw Bestelling</h2>

    <div class="mt-4 w-[350px] rounded-lg border border-gray-200 bg-white shadow-sm">
        
        <?php if (isset($component)) { $__componentOriginala5c47d95930bc3ef5466bd46b5c3027a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala5c47d95930bc3ef5466bd46b5c3027a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout.item-list','data' => ['cart' => $cart]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout.item-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cart' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cart)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala5c47d95930bc3ef5466bd46b5c3027a)): ?>
<?php $attributes = $__attributesOriginala5c47d95930bc3ef5466bd46b5c3027a; ?>
<?php unset($__attributesOriginala5c47d95930bc3ef5466bd46b5c3027a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5c47d95930bc3ef5466bd46b5c3027a)): ?>
<?php $component = $__componentOriginala5c47d95930bc3ef5466bd46b5c3027a; ?>
<?php unset($__componentOriginala5c47d95930bc3ef5466bd46b5c3027a); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginal5d8bd32a15160793a1d2ca052d32fa0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d8bd32a15160793a1d2ca052d32fa0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout.checkout-cost','data' => ['paymentValue' => $paymentValue]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout.checkout-cost'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['paymentValue' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paymentValue)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5d8bd32a15160793a1d2ca052d32fa0b)): ?>
<?php $attributes = $__attributesOriginal5d8bd32a15160793a1d2ca052d32fa0b; ?>
<?php unset($__attributesOriginal5d8bd32a15160793a1d2ca052d32fa0b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d8bd32a15160793a1d2ca052d32fa0b)): ?>
<?php $component = $__componentOriginal5d8bd32a15160793a1d2ca052d32fa0b; ?>
<?php unset($__componentOriginal5d8bd32a15160793a1d2ca052d32fa0b); ?>
<?php endif; ?>

        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
            <button type="submit" class="w-full rounded-md border border-transparent bg-navBackground px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-navBackground focus:outline-none focus:ring-2 focus:ring-navbg-navBackground focus:ring-offset-2 focus:ring-offset-gray-50">Confirm order</button>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/components/checkout/checkout-box.blade.php ENDPATH**/ ?>