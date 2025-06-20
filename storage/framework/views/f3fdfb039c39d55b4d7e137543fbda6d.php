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
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-around">
            <h2 class="font-semibold text-xl text-white leading-tight flex-1">
                <?php echo e(__('Extra opties voor product: ')); ?><span class="font-bolder"><?php echo e($product->name); ?></span>
            </h2>
        </div>
     <?php $__env->endSlot(); ?>
    
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-10">
            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <?php if (isset($component)) { $__componentOriginalf16ec0a72029fed4ce1f4a1221512a7b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf16ec0a72029fed4ce1f4a1221512a7b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.extra-images-table','data' => ['columnNames' => $imagesColumn,'images' => $extraImages,'id' => $product->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('extra-images-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['columnNames' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($imagesColumn),'images' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($extraImages),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf16ec0a72029fed4ce1f4a1221512a7b)): ?>
<?php $attributes = $__attributesOriginalf16ec0a72029fed4ce1f4a1221512a7b; ?>
<?php unset($__attributesOriginalf16ec0a72029fed4ce1f4a1221512a7b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf16ec0a72029fed4ce1f4a1221512a7b)): ?>
<?php $component = $__componentOriginalf16ec0a72029fed4ce1f4a1221512a7b; ?>
<?php unset($__componentOriginalf16ec0a72029fed4ce1f4a1221512a7b); ?>
<?php endif; ?>
            </div>

            
            
        </div>
    </div>


    
    <?php if(session()->has('extraImageSucces')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('extraImageSucces'),'title' => __('New Product')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('extraImageSucces')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('New Product'))]); ?>
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

    <?php if(session()->has('deleteSucces')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('deleteSucces'),'title' => __('Product Verwijderd')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('deleteSucces')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Product Verwijderd'))]); ?>
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

    <?php if(session()->has('noImage')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('noImage'),'title' => __('Geen foto toegevoefd')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('noImage')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Geen foto toegevoefd'))]); ?>
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

    <?php if(session()->has('extraImageEdit')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('extraImageEdit'),'title' => __('Product geupdate')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('extraImageEdit')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Product geupdate'))]); ?>
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

    <?php if(session()->has('featureEdit')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('featureEdit'),'title' => __('Feature geupdate')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('featureEdit')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Feature geupdate'))]); ?>
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

    <?php if(session()->has('productFeaturesSucces')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('productFeaturesSucces'),'title' => __('Feature toegevoegd')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('productFeaturesSucces')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Feature toegevoegd'))]); ?>
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
<?php /**PATH C:\Users\flori\D-Mmilitaria-Ecommerce\resources\views/cms/products/products-extra.blade.php ENDPATH**/ ?>