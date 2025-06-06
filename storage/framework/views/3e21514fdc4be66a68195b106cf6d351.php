<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
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
    <body class="font-sans text-gray-900 antialiased">
        <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-background">
            <div class="w-full max-w-xl mt-6 px-6 py-4 bg-white border shadow-md overflow-hidden sm:rounded-lg">
                <?php echo e($slot); ?>

            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\wamp64\www\dbmMilitaria\resources\views/layouts/guest.blade.php ENDPATH**/ ?>