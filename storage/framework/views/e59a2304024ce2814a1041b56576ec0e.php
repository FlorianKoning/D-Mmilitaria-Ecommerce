<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginal8d5e829eaf66f0f8d3e5a2d22a103a5d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d5e829eaf66f0f8d3e5a2d22a103a5d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d5e829eaf66f0f8d3e5a2d22a103a5d)): ?>
<?php $attributes = $__attributesOriginal8d5e829eaf66f0f8d3e5a2d22a103a5d; ?>
<?php unset($__attributesOriginal8d5e829eaf66f0f8d3e5a2d22a103a5d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d5e829eaf66f0f8d3e5a2d22a103a5d)): ?>
<?php $component = $__componentOriginal8d5e829eaf66f0f8d3e5a2d22a103a5d; ?>
<?php unset($__componentOriginal8d5e829eaf66f0f8d3e5a2d22a103a5d); ?>
<?php endif; ?>

     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Profile')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        <?php echo e(__('Verzending informatie bewerken.')); ?>

                    </h2>

                    <div class="flex flex-row justify-between">
                        <p class="mt-1 text-sm text-gray-600">
                            <?php echo e(__("Hier kunt u uw verzendings informatie bewerken van uw bestelling.")); ?>

                        </p>

                        <p class="mt-1 text-sm font-semibold text-gray-600">
                            <span>Bestellings Nummer:</span> #<?php echo e($order->order_number); ?>

                        </p>
                    </div>
                </header>

                <form method="post" action="<?php echo e(route('shipping.update', [$order->id, $shipping->id])); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>

                    <div class="w-full flex flex-row max-w-full gap-10">
                        
                        <div class="w-1/2">
                            <?php echo $__env->make('shipping.partials.index-left', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>

                        
                        <div class="w-1/2">
                            <?php echo $__env->make('shipping.partials.index-right', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>

                    
                    <div class="flex items-center gap-4">
                        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('Save')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <?php if(session()->has('success')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('success'),'title' => __('Informatie Opgeslagen')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('success')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Informatie Opgeslagen'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7)): ?>
<?php $attributes = $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7; ?>
<?php unset($__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7)): ?>
<?php $component = $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7; ?>
<?php unset($__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7); ?>
<?php endif; ?>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/shipping/index.blade.php ENDPATH**/ ?>