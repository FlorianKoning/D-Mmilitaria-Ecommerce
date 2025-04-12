<div class="mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Checkout</h2>

    <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16" method="POST" action="<?php echo e(route('payment.index')); ?>">
        <?php echo csrf_field(); ?>
        <div>
            
            <?php if (isset($component)) { $__componentOriginal3293e551444562dcdf620e32cb7ea99b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3293e551444562dcdf620e32cb7ea99b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout.shipping-form','data' => ['shipping' => $shippingInfo,'provinces' => $provinces]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout.shipping-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['shipping' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shippingInfo),'provinces' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($provinces)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3293e551444562dcdf620e32cb7ea99b)): ?>
<?php $attributes = $__attributesOriginal3293e551444562dcdf620e32cb7ea99b; ?>
<?php unset($__attributesOriginal3293e551444562dcdf620e32cb7ea99b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3293e551444562dcdf620e32cb7ea99b)): ?>
<?php $component = $__componentOriginal3293e551444562dcdf620e32cb7ea99b; ?>
<?php unset($__componentOriginal3293e551444562dcdf620e32cb7ea99b); ?>
<?php endif; ?>

            
            <?php if (isset($component)) { $__componentOriginale775591f2fd37f51365fdd76143c23ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale775591f2fd37f51365fdd76143c23ba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout.payment-methods','data' => ['paymentOptions' => $paymentOptions,'paymentOptionTranslation' => $paymentOptionTranslation]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout.payment-methods'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['paymentOptions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paymentOptions),'paymentOptionTranslation' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paymentOptionTranslation)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale775591f2fd37f51365fdd76143c23ba)): ?>
<?php $attributes = $__attributesOriginale775591f2fd37f51365fdd76143c23ba; ?>
<?php unset($__attributesOriginale775591f2fd37f51365fdd76143c23ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale775591f2fd37f51365fdd76143c23ba)): ?>
<?php $component = $__componentOriginale775591f2fd37f51365fdd76143c23ba; ?>
<?php unset($__componentOriginale775591f2fd37f51365fdd76143c23ba); ?>
<?php endif; ?>
        </div>

        <!-- Order summary -->
        <?php if (isset($component)) { $__componentOriginal6a9789b7f97a1ea996dce918cddf4447 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a9789b7f97a1ea996dce918cddf4447 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkout.checkout-box','data' => ['cart' => $cart,'paymentValue' => $paymentValue]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('checkout.checkout-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cart' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cart),'paymentValue' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paymentValue)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a9789b7f97a1ea996dce918cddf4447)): ?>
<?php $attributes = $__attributesOriginal6a9789b7f97a1ea996dce918cddf4447; ?>
<?php unset($__attributesOriginal6a9789b7f97a1ea996dce918cddf4447); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a9789b7f97a1ea996dce918cddf4447)): ?>
<?php $component = $__componentOriginal6a9789b7f97a1ea996dce918cddf4447; ?>
<?php unset($__componentOriginal6a9789b7f97a1ea996dce918cddf4447); ?>
<?php endif; ?>
    </form>
</div>
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/checkout/partials/checkout-index.blade.php ENDPATH**/ ?>