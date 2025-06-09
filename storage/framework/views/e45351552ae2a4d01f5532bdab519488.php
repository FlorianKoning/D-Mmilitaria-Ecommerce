<div>
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-0 lg:flex lg:w-56 lg:flex-col">
      <div class="flex grow flex-col overflow-y-auto bg-white pb-4">
        <div class="flex flex-row justify-center items-center gap-x-5 h-16 bg-logoBackground">
          <h1 class="text-white font-extrabold text-xl">CMS Dashboard</h1>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </div>
        <nav class="flex flex-1 flex-col border-r">
            <ul role="list" class="flex flex-1 flex-col gap-y-3">
                
                <div class="flex flex-row justify-between bg-cmsBtnHover text-white py-2 border-[#DBDBDB] border-b shadow">
                    <div class="px-6">
                        <h3 class="font-extrabold text-xs">Website Overivew</h3>
                    </div>
                </div>
                <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.dashboard.index'),'active' => request()->routeIs('cms.dashboard.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.dashboard.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.dashboard.index'))]); ?>
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                                <h1 class="my-auto text-xs">Dashboard</h1>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                    </ul>
                </li>


                
                <div class="flex flex-row justify-between bg-cmsBtnHover text-white py-2 border-[#DBDBDB] border-t border-b shadow">
                    <div class="px-6">
                        <h3 class="font-bold text-xs">Management</h3>
                    </div>
                </div>
                <li class="px-6">
                    <ul id="management" role="list" class="-mx-2 space-y-1">
                        <div>
                            <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.products.index'),'active' => request()->routeIs('cms.products.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.products.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.products.*'))]); ?>
                                <div class="flex flex-row gap-x-3 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>
                                    <h1 class="my-auto text-xs">Producten</h1>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                        </div>
                    </ul>
                </li>
                <li class="px-6">
                    <ul id="management" role="list" class="-mx-2 space-y-1">
                        <div>
                            <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.soldProducts.index'),'active' => request()->routeIs('cms.soldProducts.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.soldProducts.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.soldProducts.*'))]); ?>
                                <div class="flex flex-row gap-x-3 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>
                                    <h1 class="my-auto text-xs">Verkochte Producten</h1>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                        </div>
                    </ul>
                </li>
                <li class="px-6">
                    <ul id="management" role="list" class="-mx-2 space-y-1">
                        <div>
                            <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.catagories.index'),'active' => request()->routeIs('cms.catagories.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.catagories.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.catagories.*'))]); ?>
                                <div class="flex flex-row gap-x-3 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <h1 class="my-auto text-xs">Catagorien</h1>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                        </div>
                    </ul>
                </li>
                <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.exhibitions.index'),'active' => request()->routeIs('cms.exhibitions.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.exhibitions.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.exhibitions.*'))]); ?>
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                                </svg>
                                <h1 class="my-auto text-xs">Beursen</h1>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                    </ul>
                </li>
                <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.newsletter.index'),'active' => request()->routeIs('cms.newsletter.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.newsletter.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.newsletter.*'))]); ?>
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <h1 class="my-auto text-xs">Nieuwsbrief</h1>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                    </ul>
                </li>
                <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.users.index'),'active' => request()->routeIs('cms.users.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.users.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.users.*'))]); ?>
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                                <h1 class="my-auto text-xs">Gebruikers</h1>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                    </ul>
                </li>


                
                <div class="flex flex-row justify-between bg-cmsBtnHover text-white py-2 border-[#DBDBDB] border-t border-b shadow">
                    <div class="px-6">
                        <h3 class="font-extrabold text-xs py-1">Betalingen en bestellingen</h3>
                    </div>
                </div>
                <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.orders.index'),'active' => request()->routeIs('cms.orders.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.orders.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.orders.*'))]); ?>
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                <h1 class="my-auto text-xs">Bestellingen</h1>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.invoice.settings'),'active' => request()->routeIs('cms.invoice.settings')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.invoice.settings')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.invoice.settings'))]); ?>
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                <h1 class="my-auto text-xs">Factures Settings</h1>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                    </ul>
                </li>


                
                <div class="flex flex-row justify-between bg-cmsBtnHover text-white py-2 border-[#DBDBDB] border-t border-b shadow">
                    <div class="px-6">
                        <h3 class="font-bold text-xs">Website Settings</h3>
                    </div>
                </div>
                <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.emailSettings.index'),'active' => request()->routeIs('cms.emailSettings.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.emailSettings.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.emailSettings.*'))]); ?>
                            <div class="flex flex-row gap-x-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <h1 class="my-auto text-xs">Email Settings</h1>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                    </ul>
                </li>
                 <li class="px-6">
                    <ul id="overview" role="list" class="-mx-2 space-y-1">
                        <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('cms.businessSettings.index'),'active' => request()->routeIs('cms.businessSettings.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('cms.businessSettings.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('cms.businessSettings.*'))]); ?>
                            <div class="flex flex-row gap-x-3 ml-2">
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <h1 class="my-auto text-xs">Bedrijfs Settings</h1>
                            </div>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                    </ul>
                </li>


                

                
                <li class="mt-auto mx-auto">
                    <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('profile.edit'),'active' => request()->routeIs('profile.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('profile.*'))]); ?>
                        <div class="flex flex-row gap-x-3 px-6">
                            <svg class="size-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <h1 class="my-auto text-xs">Settings</h1>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal7c31356aca81a64b5d3f4569b8e77442 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms-nav-link','data' => ['href' => route('home.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('home.index'))]); ?>
                        <div class="flex flex-row gap-x-3 px-6">
                            <svg class="size-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <h1 class="my-auto text-xs">Website</h1>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $attributes = $__attributesOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__attributesOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442)): ?>
<?php $component = $__componentOriginal7c31356aca81a64b5d3f4569b8e77442; ?>
<?php unset($__componentOriginal7c31356aca81a64b5d3f4569b8e77442); ?>
<?php endif; ?>
                </li>
            </ul>
        </nav>
      </div>
    </div>

    <div class="lg:pl-56">
      <div class="fixed w-full z-0 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8 bg-cmsBtnHover text-white">
        <div class="flex flex-row justify-between">
            
            <?php if(isset($header)): ?>
                <header><?php echo e($header); ?></header>
            <?php endif; ?>
        </div>
      </div><?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/layouts/cms/navigation.blade.php ENDPATH**/ ?>