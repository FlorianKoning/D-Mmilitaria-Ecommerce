
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Catagorie overview</h1>
        <p class="mt-2 text-sm text-gray-700">Hier heb je de overview tabel van alle catagorien. Hier kan je ook nieuwe catagorien toevoegen, editen en verwijderen.</p>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <?php if (isset($component)) { $__componentOriginalde8fa99d7d164450ac21f9a0af9f14e4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalde8fa99d7d164450ac21f9a0af9f14e4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.redirect-button','data' => ['route' => route('cms.catagories.create'),'name' => __(key: 'Catagorie toevoegen')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('redirect-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.catagories.create')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__(key: 'Catagorie toevoegen'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalde8fa99d7d164450ac21f9a0af9f14e4)): ?>
<?php $attributes = $__attributesOriginalde8fa99d7d164450ac21f9a0af9f14e4; ?>
<?php unset($__attributesOriginalde8fa99d7d164450ac21f9a0af9f14e4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalde8fa99d7d164450ac21f9a0af9f14e4)): ?>
<?php $component = $__componentOriginalde8fa99d7d164450ac21f9a0af9f14e4; ?>
<?php unset($__componentOriginalde8fa99d7d164450ac21f9a0af9f14e4); ?>
<?php endif; ?>
      </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            
                            <?php $__currentLoopData = $columnNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"><?php echo e($value); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Edit</th>
                            <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Verwijder</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900"><?php echo e($value->name); ?></td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                    <a href="<?php echo e(route('cms.catagories.edit', $value->id)); ?>">
                                        <button class="rounded-md bg-logoBackground px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobg-logoBackground">
                                            <?php echo e(__('Edit')); ?>

                                        </button>
                                    </a>
                                </td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                    <button onclick="warningModel('<?php echo e(route('cms.catagories.delete', $value->id)); ?>', '<?php echo e($value->name); ?>')" class="rounded-md bg-logoBackground px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobg-logoBackground">
                                        <?php echo e(__('Verwijder')); ?>

                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/cms/catagories/partials/catagories-index.blade.php ENDPATH**/ ?>