<div class="flex flex-row justify-center">
    <button onclick="flexHideLayer('cartLayer')"
        class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-bold leading-5 text-white/70 hover:text-white hover:border-white focus:outline-none focus:text-white focus:border-white transition duration-150 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
        </svg>
    </button>
    <div id="cartLayer"
        class="hidden flex-col fixed justify-between mt-12 w-[400px] h-[380px] bg-white rounded-md border shadow-lg">
        <div class="flex flex-col space-y-6 w-[400px] h-[400px] overflow-y-scroll">
            <?php if($cart != null): ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="flex flex-row my-2 border-b border-gray-600">
                        
                        <div class="shrink-0 mx-3">
                            <img src="<?php echo e($item->main_image); ?>" alt="<?php echo e($item->name); ?>"
                                class="size-16 rounded-md object-cover">
                        </div>

                        
                        <div class="max-w-full flex flex-col justify-between w-[200px]">
                            <h4 class="font-bold"><?php echo e($item->name); ?></h4>
                            <div class="flex flex-row justify-between">
                                <p class="text-sm">Hoeveelheid: <?php echo e($item->amount); ?></p>
                                <?php if (isset($component)) { $__componentOriginal4eba5a0f5430be374961e51d7c8c9e79 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4eba5a0f5430be374961e51d7c8c9e79 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.discount-price','data' => ['item' => $item,'textSize' => __('xs')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('discount-price'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item),'textSize' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('xs'))]); ?>
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
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        
        <a href="<?php echo e(route('cart.index')); ?>">
            <button type="submit"
                class="max-w-full items-center justify-center rounded-md border border-transparent bg-navBackground px-8 py-3 text-base font-medium text-white hover:bg-navBackground/80 focus:outline-none focus:ring-2 focus:ring-navBackground focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">
                View Cart
            </button>
        </a>
    </div>


    <?php if($cartAmount != 0): ?>
        <p class="text-white mb-4 bg-black px-2 rounded-full"><?php echo e($cartAmount); ?></p>
    <?php endif; ?>
</div>
<?php /**PATH C:\wamp64\www\dbmMilitaria\resources\views/components/navigation/shopping-cart.blade.php ENDPATH**/ ?>