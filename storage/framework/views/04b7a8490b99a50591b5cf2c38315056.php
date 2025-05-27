<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['shipping', 'provinces']));

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

foreach (array_filter((['shipping', 'provinces']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<div>
    <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

    <div class="mt-4 space-y-6">
        <div class="sm:col-span-2">
            <label for="email-address" class="block text-sm/6 font-medium text-gray-700">Email address <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="email" id="email-address" name="shipping[email-address]" value="<?php echo e((Auth::check()) ? Auth::user()->email : ''); ?>" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('shipping.email-address')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('shipping.email-address'))]); ?>
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
        </div>
        <div class="sm:col-span-2">
            <label for="phone" class="block text-sm/6 font-medium text-gray-700">Phone Number <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[phone]" id="phone" value="<?php echo e(($shipping != null) ? $shipping->phone_number : ''); ?>" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('shipping.phone')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('shipping.phone'))]); ?>
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
        </div>
    </div>
</div>

<div class="mt-10 border-t border-gray-200 pt-10">
    <h2 class="text-lg font-medium text-gray-900">Shipping Information</h2>

    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
        <div>
            <label for="first-name" class="block text-sm/6 font-medium text-gray-700">First name <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" id="first-name" name="shipping[first-name]" value="<?php echo e(($shipping != null) ? $shipping->first_name : ''); ?>" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('shipping.first-name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('shipping.first-name'))]); ?>
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
        </div>

        <div>
            <label for="last-name" class="block text-sm/6 font-medium text-gray-700">Last name <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" id="last-name" name="shipping[last-name]" value="<?php echo e(($shipping != null) ? $shipping->last_name : ''); ?>" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('shipping.last-name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('shipping.last-name'))]); ?>
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
        </div>

        <div class="sm:col-span-2">
            <label for="company" class="block text-sm/6 font-medium text-gray-700">Company</label>
            <div class="mt-2">
                <input type="text" name="shipping[company]" id="company" value="<?php echo e(($shipping != null) ? $shipping->company : ''); ?>" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('shipping.company')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('shipping.company'))]); ?>
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
        </div>

        <div class="sm:col-span-2">
            <label for="address" class="block text-sm/6 font-medium text-gray-700">Address <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[address]" id="address" value="<?php echo e(($shipping != null) ? $shipping->address : ''); ?>" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('shipping.address')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('shipping.address'))]); ?>
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

        </div>

        <div class="sm:col-span-2">
            <label for="country" class="block text-sm/6 font-medium text-gray-700">Country</label>
            <div class="mt-2">
                <input placeholder="Keep empty when in the netherlands" type="text" name="shipping[country]" id="country" value="<?php echo e(($shipping != null) ? $shipping->country : ''); ?>" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('shipping.country')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('shipping.country'))]); ?>
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
        </div>

        <div>
            <label for="city" class="block text-sm/6 font-medium text-gray-700">City <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[city]" id="city" value="<?php echo e(($shipping != null) ? $shipping->city : ''); ?>" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('shipping.city')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('shipping.city'))]); ?>
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
        </div>

        <div>
            <label for="postal-code" class="block text-sm/6 font-medium text-gray-700">Postal Code <span class="text-red-500">*</span></label>
            <div class="mt-2">
                <input type="text" name="shipping[postal-code]" id="postal-code" value="<?php echo e(($shipping != null) ? $shipping->postal_code : ''); ?>" class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <?php if (isset($component)) { $__componentOriginalbac1e399be2e7e6c3e1566096e195922 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac1e399be2e7e6c3e1566096e195922 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout-input-error','data' => ['class' => 'mt-2','messages' => $errors->get('shipping.postal-code')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout-input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('shipping.postal-code'))]); ?>
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
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/components/checkout/shipping-form.blade.php ENDPATH**/ ?>