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
    
    <div class="w-full h-svh broder border-t-2 border-black/80 flex flex-col content-start">
        <div class="py-12">
            <?php echo $__env->make('products.partials.products-show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php if(session()->has('wrongPermission')): ?>
        <?php if (isset($component)) { $__componentOriginaleb6d0197656b14961c20e30ce418a460 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleb6d0197656b14961c20e30ce418a460 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-warning','data' => ['sessionText' => session('wrongPermission')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-warning'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('wrongPermission'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleb6d0197656b14961c20e30ce418a460)): ?>
<?php $attributes = $__attributesOriginaleb6d0197656b14961c20e30ce418a460; ?>
<?php unset($__attributesOriginaleb6d0197656b14961c20e30ce418a460); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb6d0197656b14961c20e30ce418a460)): ?>
<?php $component = $__componentOriginaleb6d0197656b14961c20e30ce418a460; ?>
<?php unset($__componentOriginaleb6d0197656b14961c20e30ce418a460); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(session()->has('productAdded')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('productAdded'),'title' => __('Product Toegevoegd.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('productAdded')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Product Toegevoegd.'))]); ?>
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


    <?php if(session()->has('productNotAdded')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('productNotAdded'),'title' => __('Product niet toegevoegd.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('productNotAdded')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Product niet toegevoegd.'))]); ?>
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
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/products/products-show.blade.php ENDPATH**/ ?>