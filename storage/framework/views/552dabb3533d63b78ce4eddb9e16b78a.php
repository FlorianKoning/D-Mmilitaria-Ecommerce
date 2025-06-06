<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['products', 'catagories', 'latestUpdate', 'landCatagories', 'today']));

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

foreach (array_filter((['products', 'catagories', 'latestUpdate', 'landCatagories', 'today']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="">
    <div>
        <div class="hidden relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/25" aria-hidden="true"></div>
            <div class="fixed inset-0 z-40 flex">
                <div
                    class="relative ml-auto flex size-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-6 shadow-xl">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                        <button type="button"
                            class="relative -mr-2 flex size-10 items-center justify-center p-2 text-gray-400 hover:text-gray-500">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Close menu</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        
        <main class="mx-auto max-w-full px-4 lg:max-w-full lg:px-8">
            <div class="flex flex-row w-full justify-between pb-10">
                <div class=" max-w-full">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900"> <?php echo e($_SERVER['REQUEST_URI'] != '/product-archive' ? 'New Products' : 'Product Archive'); ?></h1>
                    <p class="flex flex-col lg:flex-row lg:gap-2 w-fit mt-4 text-base text-gray-500 border-b border-gray-400">Latest update: <br class="lg:hi dden"> <span class="text-gray-900 break-words"><?php echo e($latestUpdate); ?></span></p>
                </div>

                
                <div class="mt-auto">
                    <a class="font-semibold border-b border-gray-400 hover:text-navBackground"
                        href="<?php echo e($_SERVER['REQUEST_URI'] != '/product-archive' ? route('home.archive') : route('home.index')); ?>">
                        <?php echo e($_SERVER['REQUEST_URI'] != '/product-archive' ? 'Product Archive' : 'New Products'); ?>

                    </a>
                </div>
            </div>

           
           <?php if (isset($component)) { $__componentOriginal73c1fe82cfed39fcf11314d15729a7a2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73c1fe82cfed39fcf11314d15729a7a2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front-page.filter','data' => ['landCatagories' => $landCatagories,'catagories' => $catagories,'products' => $products]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('front-page.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['landCatagories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($landCatagories),'catagories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($catagories),'products' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($products)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73c1fe82cfed39fcf11314d15729a7a2)): ?>
<?php $attributes = $__attributesOriginal73c1fe82cfed39fcf11314d15729a7a2; ?>
<?php unset($__attributesOriginal73c1fe82cfed39fcf11314d15729a7a2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73c1fe82cfed39fcf11314d15729a7a2)): ?>
<?php $component = $__componentOriginal73c1fe82cfed39fcf11314d15729a7a2; ?>
<?php unset($__componentOriginal73c1fe82cfed39fcf11314d15729a7a2); ?>
<?php endif; ?>
        </main>
    </div>
</div>


<script>
    $("#catagorieForm").change(function() {
        $("#catagorieForm").trigger('submit');
    })
</script>
<?php /**PATH C:\wamp64\www\dbmMilitaria\resources\views/components/item-list.blade.php ENDPATH**/ ?>