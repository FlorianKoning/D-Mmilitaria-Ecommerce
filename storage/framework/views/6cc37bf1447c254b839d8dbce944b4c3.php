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
    <div class="w-full h-full max-h-screen">
         <?php $__env->slot('header', null, []); ?> 
            <div class="flex justify-around">
                <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                    <?php echo e(__('CMS Dashboard')); ?>

                </h2>
            </div>
         <?php $__env->endSlot(); ?>

        <div class="flex flex-col justify-evenly h-screen">
            <div class="w-full h-1/3">
                
                <?php if (isset($component)) { $__componentOriginalf5695c90588404935c49934f4245ff32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5695c90588404935c49934f4245ff32 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.dashboard.dashboard-top-tiles','data' => ['orders' => $orders,'customers' => $customers]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.dashboard.dashboard-top-tiles'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['orders' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orders),'customers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($customers)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5695c90588404935c49934f4245ff32)): ?>
<?php $attributes = $__attributesOriginalf5695c90588404935c49934f4245ff32; ?>
<?php unset($__attributesOriginalf5695c90588404935c49934f4245ff32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5695c90588404935c49934f4245ff32)): ?>
<?php $component = $__componentOriginalf5695c90588404935c49934f4245ff32; ?>
<?php unset($__componentOriginalf5695c90588404935c49934f4245ff32); ?>
<?php endif; ?>
            </div>
            
            <div class="w-full h-2/3">
                
                <?php if (isset($component)) { $__componentOriginalf13699368b9726a3f96ae95892e98913 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf13699368b9726a3f96ae95892e98913 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.dashboard.dashboard-middle-graphs','data' => ['profitChart' => $profitChart,'dateOptions' => $dateOptions,'exportOptions' => $exportOptions]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.dashboard.dashboard-middle-graphs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['profitChart' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($profitChart),'dateOptions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($dateOptions),'exportOptions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($exportOptions)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf13699368b9726a3f96ae95892e98913)): ?>
<?php $attributes = $__attributesOriginalf13699368b9726a3f96ae95892e98913; ?>
<?php unset($__attributesOriginalf13699368b9726a3f96ae95892e98913); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf13699368b9726a3f96ae95892e98913)): ?>
<?php $component = $__componentOriginalf13699368b9726a3f96ae95892e98913; ?>
<?php unset($__componentOriginalf13699368b9726a3f96ae95892e98913); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
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
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/cms/cms-dashboard.blade.php ENDPATH**/ ?>