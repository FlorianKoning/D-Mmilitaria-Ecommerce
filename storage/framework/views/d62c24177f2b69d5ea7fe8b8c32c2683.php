<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['columnNames', 'features', 'id']));

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

foreach (array_filter((['columnNames', 'features', 'id']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Extra features tabel</h1>
        <p class="mt-2 text-sm text-gray-700">Hier kan je extra beschrijvingen of unieke eigenschappen toevoegen dat het product heeft. Dit word dan weer weergegeven bij het product.</p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <button onclick="openModal('extraFeatures')" type="button" class="block rounded-md bg-logoBackground px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobg-logoBackground">Feature toevoegen</button>
    </div>
</div>
<div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="shadow ring-1 ring-black/5 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <?php $__currentLoopData = $columnNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"><?php echo e($column); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Optie</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?php echo e($feature->feature); ?></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?php echo e($feature->product_id); ?></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'left','width' => '32']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'left','width' => '32']); ?>
                                 <?php $__env->slot('trigger', null, []); ?> 
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-logoBackground focus:outline-none transition ease-in-out duration-150">
                                        <div>Opties</div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                 <?php $__env->endSlot(); ?>

                                 <?php $__env->slot('content', null, []); ?> 
                                    
                                    <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <button class="flex w-full" onclick="editModal('extraFeaturesEdit', 'featureName', '<?php echo e($feature->feature); ?>')"><?php echo e(__('Edit')); ?></button>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>


                                    
                                    <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <button class="flex w-full" onclick="featureWarning('warningModelFeature')"><?php echo e(__('Verwijder')); ?></button>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
                        </td>
                        
                        <?php if (isset($component)) { $__componentOriginal6a4f9248e22234a0b486211ad8b1b3c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a4f9248e22234a0b486211ad8b1b3c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.warning-modal','data' => ['catagory' => __('product Feature'),'route' => route('cms.extraFeature.delete', $feature->id),'name' => $feature->feature,'id' => __('warningModelFeature')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('warning-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['catagory' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('product Feature')),'route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.extraFeature.delete', $feature->id)),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($feature->feature),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('warningModelFeature'))]); ?>
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

                        
                        <?php if (isset($component)) { $__componentOriginal5774edc4841e511fddc9e0835fdd4ee8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5774edc4841e511fddc9e0835fdd4ee8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.extra-features-edit-modal','data' => ['id' => $feature->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('extra-features-edit-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($feature->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5774edc4841e511fddc9e0835fdd4ee8)): ?>
<?php $attributes = $__attributesOriginal5774edc4841e511fddc9e0835fdd4ee8; ?>
<?php unset($__attributesOriginal5774edc4841e511fddc9e0835fdd4ee8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5774edc4841e511fddc9e0835fdd4ee8)): ?>
<?php $component = $__componentOriginal5774edc4841e511fddc9e0835fdd4ee8; ?>
<?php unset($__componentOriginal5774edc4841e511fddc9e0835fdd4ee8); ?>
<?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>



<?php if (isset($component)) { $__componentOriginalc83d003aaf4c9663350be1b4022170f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc83d003aaf4c9663350be1b4022170f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.extra-features-modal','data' => ['id' => $id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('extra-features-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc83d003aaf4c9663350be1b4022170f4)): ?>
<?php $attributes = $__attributesOriginalc83d003aaf4c9663350be1b4022170f4; ?>
<?php unset($__attributesOriginalc83d003aaf4c9663350be1b4022170f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc83d003aaf4c9663350be1b4022170f4)): ?>
<?php $component = $__componentOriginalc83d003aaf4c9663350be1b4022170f4; ?>
<?php unset($__componentOriginalc83d003aaf4c9663350be1b4022170f4); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/components/extra-features-table.blade.php ENDPATH**/ ?>