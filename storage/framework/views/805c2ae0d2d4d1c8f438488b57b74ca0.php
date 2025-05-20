<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['paymentOptions', 'paymentOptionTranslation']));

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

foreach (array_filter((['paymentOptions', 'paymentOptionTranslation']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="pt-10">
    <fieldset>
        <legend class="text-lg font-medium text-gray-900">Betalings methodes</legend>
        <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('paymentOptions')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('paymentOptions'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbac1e399be2e7e6c3e1566096e195922)): ?>
<?php $attributes = $__attributesOriginalbac1e399be2e7e6c3e1566096e195922; ?>
<?php unset($__attributesOriginalbac1e399be2e7e6c3e1566096e195922); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbac1e399be2e7e6c3e1566096e195922)): ?>
<?php $component = $__componentOriginalbac1e399be2e7e6c3e1566096e195922; ?>
<?php unset($__componentOriginalbac1e399be2e7e6c3e1566096e195922); ?>
<?php endif; ?>
        <div class="mt-4 flex flex-col gap-y-6">
            <?php if($paymentOptions != null): ?>
                <?php $__currentLoopData = $paymentOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label onclick="paymentMethod('<?php echo e($option->id); ?>')" aria-label="Standard" aria-description="4–10 business days for $5.00" class="relative flex cursor-pointer rounded-lg bg-white p-4 shadow focus:outline-none w-[350px]">
                        <input id="<?php echo e($option->id); ?>" name="paymentMethod[<?php echo e($option->id); ?>]"  type="radio" class="sr-only">
                        <span class="flex flex-1">
                            <span class="flex flex-col">
                                <span class="block text-sm font-medium text-gray-900"><?php echo e($paymentOptionTranslation['nl']['payment_name'][$option->payment_name]); ?>.</span>
                                <span class="mt-1 flex items-center text-sm text-gray-500"><?php echo e($paymentOptionTranslation['nl']['shipping'][$option->shipping]); ?>.</span>
                                <span class="mt-6 flex items-center text-sm text-gray-900"><?php echo e($paymentOptionTranslation['nl']['shipping_cost'][$option->shipping_cost]); ?>.</span>
                                <?php if($option->extra_service_costs == 1): ?>
                                    <span class="text-sm font-medium text-gray-500"><?php echo e($paymentOptionTranslation['nl']['extra_service_costs'][$option->extra_service_costs]); ?>.</span>
                                <?php endif; ?>
                            </span>
                        </span>
                        <svg id="paymentMethod<?php echo e($option->id); ?>" class="size-5 text-navBackground <?php echo e(($option->id != 3) ? 'hidden' : ''); ?>" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                        </svg>
                        <span class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </fieldset>
</div>
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/components/checkout/payment-methods.blade.php ENDPATH**/ ?>