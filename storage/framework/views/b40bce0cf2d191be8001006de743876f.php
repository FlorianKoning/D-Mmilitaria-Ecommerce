<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['landCatagories', 'catagories', 'products']));

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

foreach (array_filter((['landCatagories', 'catagories', 'products']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="pb-24 pt-12 lg:grid lg:grid-cols-4 lg:gap-x-8 xl:grid-cols-4">
    <aside>
        <h2 class="sr-only">Filters</h2>
        <button onclick="hideLayer('filter')" type="button" class="inline-flex items-center lg:hidden">
            <span class="text-sm font-medium text-gray-700">Filters</span>
            <svg class="ml-1 size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true" data-slot="icon">
                <path
                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
            </svg>
        </button>

        <div id="filter" class="hidden lg:block bg-white p-5 rounded-xl border shadow">
            <form id="catagorieForm" method="GET" action="<?php echo e(route('home.index')); ?>"
                class="space-y-10 divide-y divide-gray-200">
                <div class="pt-2">
                    <fieldset>
                        <div class="flex flex-row gap-4">
                            <legend class="block text-sm font-medium text-gray-900">Search Products</legend>
                        
                            <?php if(isset($_GET['search'])): ?>
                                <a class="my-auto hover:text-navBackground" href="<?php echo e(route('home.index')); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="space-y-3 pt-2">
                            <div class="mb-6">
                                <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['name' => 'search','id' => 'search','class' => 'bg-[#F3F5F7] border-[#F3F5F7]/80 block mt-1 w-full','type' => 'text','value' => isset($_GET['search']) ? $_GET['search'] : '','required' => true,'autocomplete' => 'username']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','id' => 'search','class' => 'bg-[#F3F5F7] border-[#F3F5F7]/80 block mt-1 w-full','type' => 'text','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset($_GET['search']) ? $_GET['search'] : ''),'required' => true,'autocomplete' => 'username']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </fieldset>



                    
                    <?php if($landCatagories->count() != 0): ?>
                        <fieldset>
                            <legend class="block text-sm font-medium text-gray-900">Categories: Country
                            </legend>
                            <div class="space-y-3 pt-2">
                                <?php $__currentLoopData = $landCatagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input
                                                    <?php echo e(isset($_GET['landCategory']) && in_array(strval($item->id), $_GET['landCategory']) ? 'checked' : ''); ?>

                                                    id="category-0" name="landCategory[]"
                                                    value="<?php echo e($item->id); ?>" type="checkbox"
                                                    class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-navBackground checked:bg-navborder-navBackground indeterminate:border-navBackground indeterminate:bg-navborder-navBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-navborder-navBackground disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                        d="M3 8L6 11L11 3.5" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                        d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="category-0"
                                            class="text-sm text-gray-600"><?php echo e($item->name); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </fieldset>
                    <?php endif; ?>

                    
                    <?php if($catagories->count() != 0): ?>
                        <fieldset>
                            <legend class="block text-sm font-medium text-gray-900 pt-6">Categories: Items
                            </legend>
                            <div class="space-y-3 pt-2">
                                <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input
                                                    <?php echo e(isset($_GET['category']) && in_array(strval($item->id), $_GET['category']) ? 'checked' : ''); ?>

                                                    id="category-0" name="category[]"
                                                    value="<?php echo e($item->id); ?>" type="checkbox"
                                                    class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-navBackground checked:bg-navborder-navBackground indeterminate:border-navBackground indeterminate:bg-navborder-navBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-navborder-navBackground disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
                                                    viewBox="0 0 14 14" fill="none">
                                                    <path class="opacity-0 group-has-[:checked]:opacity-100"
                                                        d="M3 8L6 11L11 3.5" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        class="opacity-0 group-has-[:indeterminate]:opacity-100"
                                                        d="M3 7H11" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="category-0"
                                            class="text-sm text-gray-600"><?php echo e($item->name); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </fieldset>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </aside>

    <section aria-labelledby="product-heading" class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
        <h2 id="product-heading" class="sr-only">Products</h2>

        <?php if(count($products) > 0): ?>
            <div
                class="grid grid-cols-1 gap-y-3 sm:grid-cols-1 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-4">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div
                        class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-400 bg-white">
                        <img src="<?php echo e($item->main_image); ?>" alt="Helm"
                            class="bg-gray-100 object-cover group-hover:opacity-75 size-[500px] lg:size-96">
                        <div class="flex flex-1 flex-col space-y-2 p-4">
                            <h3 class="text-sm font-medium text-gray-900">
                                <a href="<?php echo e(route('products.show', $item->id)); ?>">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    <?php echo e($item->name); ?>

                                </a>
                            </h3>
                            
                            <div class="flex flex-1 flex-col justify-end">
                                <div class="flex flex-row justify-between">
                                    
                                    <?php if($item->inventory > 0): ?>
                                        <?php if (isset($component)) { $__componentOriginal4eba5a0f5430be374961e51d7c8c9e79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4eba5a0f5430be374961e51d7c8c9e79 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.discount-price','data' => ['item' => $item]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('discount-price'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4eba5a0f5430be374961e51d7c8c9e79)): ?>
<?php $attributes = $__attributesOriginal4eba5a0f5430be374961e51d7c8c9e79; ?>
<?php unset($__attributesOriginal4eba5a0f5430be374961e51d7c8c9e79); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4eba5a0f5430be374961e51d7c8c9e79)): ?>
<?php $component = $__componentOriginal4eba5a0f5430be374961e51d7c8c9e79; ?>
<?php unset($__componentOriginal4eba5a0f5430be374961e51d7c8c9e79); ?>
<?php endif; ?>
                                    <?php endif; ?>

                                    
                                    <?php if($item->inventory > 0): ?>
                                        <div class="flex flex-row gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="my-auto size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                            <p class="text-sm text-gray-900">In stock</p>
                                        </div>
                                    <?php else: ?>
                                        <div class="flex flex-row gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="my-auto size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                            <p class="text-sm text-gray-900">Out of stock</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="w-full flex text-center">
                <h1 class="w-full text-3xl font-bold">There where no products found.</h1>
            </div>
        <?php endif; ?>
    </section>
</div><?php /**PATH C:\wamp64\www\dbmMilitaria\resources\views/components/front-page/filter.blade.php ENDPATH**/ ?>