
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Product categorieën link</h1>
        <p class="mt-2 text-sm text-gray-700">Hier kunt u het product linken aan de product categorieën</p>
      </div>
    </div>

    <form method="POST" action="<?php echo e(route('cms.products.extraCategorieStore', [$product->id, 'product'])); ?>">
        <?php echo csrf_field(); ?>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div>
                        <button type="submit" class="float-right block rounded-md bg-logoBackground px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#3C8DBC] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#3C8DBC]">
                            <?php echo e(__('Submit')); ?>

                        </button>
                        <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
                        <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <fieldset class="border-b border-t border-gray-200">
                                <legend class="sr-only">Notifications</legend>
                                <div class="divide-y divide-gray-200">
                                    <div class="relative flex gap-3 pb-4 pt-3.5">
                                            <div class="min-w-0 flex-1 text-sm/6">
                                            <label for="comments" class="font-medium text-gray-900"><?php echo e($item->name); ?></label>
                                        </div>
                                        <div class="flex h-6 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="comments" aria-describedby="comments-description" <?php echo e($productCategoriesLinked::exists($item->id, $product->id) ? 'checked' : ''); ?> name="categories[<?php echo e($item->id); ?>]" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-logoBackground checked:bg-logoborder-logoBackground indeterminate:border-logoBackground indeterminate:bg-logoborder-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logoborder-logoBackground disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                                    <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<?php if (isset($component)) { $__componentOriginal6a4f9248e22234a0b486211ad8b1b3c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a4f9248e22234a0b486211ad8b1b3c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.warning-modal','data' => ['catagory' => __('catagory')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('warning-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['catagory' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('catagory'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a4f9248e22234a0b486211ad8b1b3c5)): ?>
<?php $attributes = $__attributesOriginal6a4f9248e22234a0b486211ad8b1b3c5; ?>
<?php unset($__attributesOriginal6a4f9248e22234a0b486211ad8b1b3c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a4f9248e22234a0b486211ad8b1b3c5)): ?>
<?php $component = $__componentOriginal6a4f9248e22234a0b486211ad8b1b3c5; ?>
<?php unset($__componentOriginal6a4f9248e22234a0b486211ad8b1b3c5); ?>
<?php endif; ?>



<?php if(session()->has('productCategorieEmpty')): ?>
<?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('productCategorieEmpty'),'title' => __('Geen categorie geselecteerd!')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('productCategorieEmpty')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Geen categorie geselecteerd!'))]); ?>
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

<?php if(session()->has('productCategorieDelete')): ?>
<?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('productCategorieDelete'),'title' => __('Categorie Verwijderd')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('productCategorieDelete')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Categorie Verwijderd'))]); ?>
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

<?php if(session()->has('productCategorieLink')): ?>
<?php if (isset($component)) { $__componentOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal17a22b5bd9358a0459eff8ff7a682ee7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-succes','data' => ['sessionText' => session('productCategorieLink'),'title' => __('Categorie aangemaakt')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-succes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('productCategorieLink')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Categorie aangemaakt'))]); ?>
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
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/cms/products/partials/products-categories-product.blade.php ENDPATH**/ ?>