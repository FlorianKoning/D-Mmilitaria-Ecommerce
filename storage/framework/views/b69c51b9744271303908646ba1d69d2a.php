<section>
    <div class="mx-auto max-w-2xl px-4 py-18 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 bg-white p-5 rounded-xl border shadow">
        <div class="flex flex-col lg:flex-row w-full gap-2">

            <!-- Image gallery -->
            <div class="w-2/3 flex flex-col-reverse">
                <!-- Image selector -->
                <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
                    <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                        <button id="tabs-1-tab-1" class="relative flex h-40 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-navBackground focus:ring-offset-4" aria-controls="tabs-1-panel-1" role="tab" type="button">
                            <span class="absolute inset-0 rounded-md">
                                <img onclick="changeImage($(this).attr('src'))" src="<?php echo e($product->main_image); ?>" alt="" class="size-full object-cover">
                            </span>
                            <!-- Selected: "ring-navBackgroundNot Selected: "ring-transparent" -->
                            <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-transparent ring-offset-2" aria-hidden="true"></span>
                        </button>

                        
                        <?php $__currentLoopData = $extraImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button id="tabs-1-tab-1" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-navBackground focus:ring-offset-4" aria-controls="tabs-1-panel-1" role="tab" type="button">
                                <span class="sr-only">Angled view</span>
                                <span class="absolute inset-0 overflow-hidden rounded-md">
                                    <img onclick="changeImage($(this).attr('src'))" src="<?php echo e($image->image_url); ?>" alt="<?php echo e($image->image_name); ?>" class="max-w-full size-96 object-cover">
                                </span>
                                <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-transparent ring-offset-2" aria-hidden="true"></span>
                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div>
                    <!-- Tab panel, show/hide based on tab state. -->
                    <div class="flex items-center" id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                        <div onclick="imageArray('left', '<?php echo e($product->id); ?>')" class="hover:text-navBackground hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </div>
    
                        <img onclick="showImage($('#mainImage').attr('src'))" id="mainImage" src="<?php echo e($product->main_image); ?>" alt="<?php echo e($product->description); ?>" class="w-3/4  object-cover sm:rounded-lg hover:cursor-pointer">
    
                        <div onclick="imageArray('right', '<?php echo e($product->id); ?>')" class="hover:text-navBackground hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
    
                    <!-- More images... -->
                </div>
            </div>

            <!-- Product info -->
            <div class="w-1/3 mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                
                <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?php echo e($product->name); ?></h1>


                
                <div class="mt-3">
                    <h2 class="sr-only">Product information</h2>
                    <?php if($product->inventory > 0): ?>
                        <?php if (isset($component)) { $__componentOriginal4eba5a0f5430be374961e51d7c8c9e79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4eba5a0f5430be374961e51d7c8c9e79 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.discount-price','data' => ['item' => $product,'textSize' => __('xl')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('discount-price'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product),'textSize' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('xl'))]); ?>
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
                </div>


                
                <?php if($product->show_quantity): ?>
                    <div class="mt-3">
                        <div class="flex flex-row gap-x-1">
                            <p class="text-sm font-medium text-gray-900">qnt: <?php echo e($product->inventory); ?></p>
                        </div>
                    </div>
                <?php endif; ?>


                
                <div class="mt-6">
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6 text-base text-gray-700">
                        <p><?php echo nl2br($product->big_desc); ?></p>
                    </div>
                </div>


                <div class="mt-10">
                    <?php if($product->inventory > 0): ?>
                        <form method="POST" action="<?php echo e(route('cart.store', $product->id)); ?>" class="mt-6">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-navBackground px-8 py-3 text-base font-medium text-white hover:bg-navBackground/80 focus:outline-none focus:ring-2 focus:ring-navBackground focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Add to cart</button>
                        </form>
                    <?php else: ?>
                        <button type="button" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-navBackground px-8 py-3 text-base font-medium text-white sm:w-full cursor-not-allowed">Product Uitverkocht</button>
                    <?php endif; ?>

                    <button type="button" class="hidden ml-4 flex items-center justify-center rounded-md px-3 py-3 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                        <svg class="size-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        <span class="sr-only">Add to favorites</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<input id="key" type="hidden" value="<?php echo e(0); ?>">

<!---->
<div id="modal" class="hidden">
  <div class="relative z-[60]" aria-labelledby="dialog-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500/60 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex flex-row min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <img id="modalImage" src="" alt="Angled front view with bag zipped and handles upright." class="size-[500px] aspect-square object-cover sm:rounded-lg">
      </div>
    </div>
  </div>
</div>

<script>
</script>
<?php /**PATH C:\Users\flori\D-Mmilitaria-Ecommerce\resources\views/products/partials/products-show.blade.php ENDPATH**/ ?>