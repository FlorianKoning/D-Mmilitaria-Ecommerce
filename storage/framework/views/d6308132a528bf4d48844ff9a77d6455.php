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
    
    <div class="flex flex-col content-start">
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

        
        <div class="py-6">
            <?php if (isset($component)) { $__componentOriginal75719a873aef52870b75ff337fe33664 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75719a873aef52870b75ff337fe33664 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.item-list','data' => ['products' => $products,'catagories' => $catagories,'latestUpdate' => $latestUpdate,'landCatagories' => $landCatagories,'today' => $today]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('item-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['products' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($products),'catagories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($catagories),'latestUpdate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($latestUpdate),'landCatagories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($landCatagories),'today' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($today)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75719a873aef52870b75ff337fe33664)): ?>
<?php $attributes = $__attributesOriginal75719a873aef52870b75ff337fe33664; ?>
<?php unset($__attributesOriginal75719a873aef52870b75ff337fe33664); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75719a873aef52870b75ff337fe33664)): ?>
<?php $component = $__componentOriginal75719a873aef52870b75ff337fe33664; ?>
<?php unset($__componentOriginal75719a873aef52870b75ff337fe33664); ?>
<?php endif; ?>
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

    
    <?php if(session()->has('bankTransfer')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('bankTransfer'),'title' => __('Nieuwe Order')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('bankTransfer')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Nieuwe Order'))]); ?>
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

    
    <?php if(session()->has('error')): ?>
        <?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('error'),'title' => __('Er is iets fout gegaan')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('error')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Er is iets fout gegaan'))]); ?>
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
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/frontPage.blade.php ENDPATH**/ ?>