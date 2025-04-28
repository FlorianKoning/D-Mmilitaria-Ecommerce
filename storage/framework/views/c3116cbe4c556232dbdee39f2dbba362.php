<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Beursen overview</h1>
        <p class="mt-2 text-sm text-gray-700">Hier heb je de overview tabel van alle producten. Hier kan je ook nieuwe producten toevoegen, editen en verwijderen.</p>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <?php if (isset($component)) { $__componentOriginalde8fa99d7d164450ac21f9a0af9f14e4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalde8fa99d7d164450ac21f9a0af9f14e4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.redirect-button','data' => ['route' => route('cms.exhibitions.create'),'name' => __('Berus Toevoegen')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('redirect-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.exhibitions.create')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Berus Toevoegen'))]); ?>
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
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Opties</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <?php $__currentLoopData = $exhibitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900"><?php echo e($value->exhibition_name); ?></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900"><?php echo e($value->exhibition_location); ?></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900"><?php echo e($value->exhibition_date); ?></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900"><?php echo e($value->exhibition_opening_time); ?></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900"><?php echo e($value->exhibition_closing_time); ?></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                            <?php if($value->present == 1): ?>
                                <form id="presentForm-<?php echo e($value->id); ?>" method="POST" action="<?php echo e(route('cms.exhibitions.update.present', $value->id)); ?>">
                                    <?php echo csrf_field(); ?>

                                    <button onclick="document.getElementById('presentForm-<?php echo e($value->id); ?>').submit();" type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-green-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 cursor-pointer">
                                        <svg class="-ml-0.5 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                        </svg>
                                        Aanwezig
                                    </button>
                                </form>
                            <?php else: ?>
                                <form id="presentForm-<?php echo e($value->id); ?>" method="POST" action="<?php echo e(route('cms.exhibitions.update.present', $value->id)); ?>">
                                    <?php echo csrf_field(); ?>

                                    <button onclick="document.getElementById('presentForm-<?php echo e($value->id); ?>').submit();" type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fizll="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        Niet Aanwezig
                                    </button>
                                </form>
                            <?php endif; ?>
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-white">
                            <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'left','width' => '48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'left','width' => '48']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('cms.exhibition.edit', $value->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.exhibition.edit', $value->id))]); ?>
                                        <?php echo e(__('Edit')); ?>

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
                                        <button onclick="warningModel('<?php echo e(route('cms.exhibition.delete', $value->id)); ?>', '<?php echo e($value->exhibition_name); ?>')"><?php echo e(__('Verwijder')); ?></button>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.warning-modal','data' => ['catagory' => __('beurs')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('warning-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['catagory' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('beurs'))]); ?>
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




<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/cms/exhibitions/partials/index.blade.php ENDPATH**/ ?>