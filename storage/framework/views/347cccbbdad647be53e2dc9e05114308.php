<!DOCTYPE html>
<html class="h-full" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        
        <script defer src="<?php echo e(asset('js/main.js')); ?>" type="text/javascript"></script>
        <script defer src="<?php echo e(asset('js/liveSearch.js')); ?>" type="text/javascript"></script>
        <script defer src="<?php echo e(asset('js/frontPage.js')); ?>" type="text/javascript"></script>
        <script defer src="<?php echo e(asset('js/checkout.js')); ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/drag-drop.js')); ?>"></script>


        
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>


        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="<?php echo e($functions::requestUriCheck('/cms', 'font-robotoMono', 'font-sans')); ?> antialiased <?php echo e($functions::requestUriCheck('/cms', 'bg-[#F5F5F5]', 'bg-background')); ?> ">
        <?php if(str_contains($_SERVER['REQUEST_URI'], '/cms')): ?>
            <?php echo $__env->make('layouts.cms.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <main class="py-10">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <!-- Your content -->
                        <?php echo e($slot); ?>

                    </div>
                    </main>
                </div>
            </div>
        <?php else: ?>
            <div class="h-full mt-16">
                <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <!-- Page Content -->
                <main>
                    <?php if (isset($component)) { $__componentOriginalff9615640ecc9fe720b9f7641382872b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff9615640ecc9fe720b9f7641382872b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $attributes = $__attributesOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__attributesOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $component = $__componentOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__componentOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>
                    <?php echo e($slot); ?>

                </main>

                
                <footer class="bg-[#36424b]">
                    <?php if (isset($component)) { $__componentOriginal1ad6965a13d836e32d2b9d70591e8bf2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1ad6965a13d836e32d2b9d70591e8bf2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer-content','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1ad6965a13d836e32d2b9d70591e8bf2)): ?>
<?php $attributes = $__attributesOriginal1ad6965a13d836e32d2b9d70591e8bf2; ?>
<?php unset($__attributesOriginal1ad6965a13d836e32d2b9d70591e8bf2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1ad6965a13d836e32d2b9d70591e8bf2)): ?>
<?php $component = $__componentOriginal1ad6965a13d836e32d2b9d70591e8bf2; ?>
<?php unset($__componentOriginal1ad6965a13d836e32d2b9d70591e8bf2); ?>
<?php endif; ?>
                </footer>
            </div>
        <?php endif; ?>
    </body>
</html>
<?php /**PATH C:\wamp64\www\dbmMilitaria\resources\views/layouts/app.blade.php ENDPATH**/ ?>