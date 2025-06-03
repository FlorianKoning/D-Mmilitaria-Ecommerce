<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="w-full broder border-t-2 border-black/80 flex flex-col content-start">
        <div class="py-12">
            <?php echo $__env->make('checkout.partials.checkout-index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    <?php if(session()->has('duplicateOrder')): ?>
        <?php if (isset($component)) { $__componentOriginaleb6d0197656b14961c20e30ce418a460 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleb6d0197656b14961c20e30ce418a460 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-warning','data' => ['sessionText' => session('duplicateOrder')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-warning'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('duplicateOrder'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleb6d0197656b14961c20e30ce418a460)): ?>
<?php $attributes = $__attributesOriginaleb6d0197656b14961c20e30ce418a460; ?>
<?php unset($__attributesOriginaleb6d0197656b14961c20e30ce418a460); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb6d0197656b14961c20e30ce418a460)): ?>
<?php $component = $__componentOriginaleb6d0197656b14961c20e30ce418a460; ?>
<?php unset($__componentOriginaleb6d0197656b14961c20e30ce418a460); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(session()->has('erorr')): ?>
        <?php if (isset($component)) { $__componentOriginaleb6d0197656b14961c20e30ce418a460 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleb6d0197656b14961c20e30ce418a460 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-warning','data' => ['sessionText' => session('error')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-warning'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sessionText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('error'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleb6d0197656b14961c20e30ce418a460)): ?>
<?php $attributes = $__attributesOriginaleb6d0197656b14961c20e30ce418a460; ?>
<?php unset($__attributesOriginaleb6d0197656b14961c20e30ce418a460); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleb6d0197656b14961c20e30ce418a460)): ?>
<?php $component = $__componentOriginaleb6d0197656b14961c20e30ce418a460; ?>
<?php unset($__componentOriginaleb6d0197656b14961c20e30ce418a460); ?>
<?php endif; ?>
    <?php endif; ?>

<script>
    const shippingCountry = document.getElementById('shippingCountry');

    function paymentMethod(id, shipping = null, serviceCost = null) {
        const subtotal = $('#inputSubtotal').val();

        switch (id) {
            case '1':
                // Displays the check
                $('#paymentMethod1').fadeIn().removeClass('hidden');
                $('#paymentMethod2').fadeOut().addClass('hidden');
                $('#paymentMethod3').fadeOut().addClass('hidden');

                // Checks the input
                $('#1').attr('value', 'checked');
                $('#2').attr('value', '');
                $('#3').attr('value', '');

                // Changes the pricing
                $('#shippingCost').fadeIn().removeClass('hidden');
                $('#shippingCost').removeAttr('style');

                $.ajax({
                    type:'GET',
                    url:'/ajax/shipping-country/'+id,
                    dataType: "json",
                    success: function(data) {
                        total = parseInt(document.getElementById('subtotal').innerHTML);

                        $('#total').html(total + data.shipping_cost);
                        $('#shippingAmount').html(data.shipping_cost);
                        $('#inputPayment').val(total + data.shipping_cost);
                    }
                });
                break;

            case '2':
                // Displays the check
                $('#paymentMethod2').fadeIn().removeClass('hidden');
                $('#paymentMethod2').removeAttr('style');
                $('#paymentMethod1').fadeOut().addClass('hidden');
                $('#paymentMethod3').fadeOut().addClass('hidden');

                // Checks the input
                $('#1').attr('value', '');
                $('#2').attr('value', 'checked');
                $('#3').attr('value', '');

                // Changes the pricing
                $('#shippingCost').fadeOut().addClass('hidden');

                total = parseInt(document.getElementById('subtotal').innerHTML);

                $('#total').html(total);
                break;
            case '3':
                // Displays the check
                $('#paymentMethod3').fadeIn().removeClass('hidden');
                $('#paymentMethod1').fadeOut().addClass('hidden');
                $('#paymentMethod2').fadeOut().addClass('hidden');

                // Checks the input
                $('#1').attr('value', '');
                $('#2').attr('value', '');
                $('#3').attr('value', 'checked');

                // Changes the pricing
                $('#shippingCost').fadeIn().removeClass('hidden');
                $('#shippingCost').removeAttr('style');

                break;
            default:
                // Displays the check
                $('#paymentMethod3').fadeIn().removeClass('hidden');
                $('#paymentMethod1').fadeOut().addClass('hidden');
                $('#paymentMethod2').fadeOut().addClass('hidden');

                // Checks the input
                $('#1').attr('value', '');
                $('#2').attr('value', '');
                $('#3').attr('value', 'checked');

                // Changes the pricing
                $('#shippingCost').fadeIn().removeClass('hidden');
                $('#shippingCost').removeAttr('style');

                break;
        }
    }

    window.onload = function() {
        id = shippingCountry.value;

        $.ajax({
            type:'GET',
            url:'/ajax/shipping-country/'+id,
            dataType: "json",
            success: function(data) {
                total = parseInt(document.getElementById('subtotal').innerHTML);

                $('#total').html(total + data.shipping_cost);
                $('#shippingAmount').html(data.shipping_cost);
                $('#inputPayment').val(total + data.shipping_cost);
            }
        });
    };


    shippingCountry.addEventListener('click', function() {
        id = shippingCountry.value;

        $.ajax({
            type:'GET',
            url:'/ajax/shipping-country/'+id,
            dataType: "json",
            success: function(data) {
                total = parseInt(document.getElementById('subtotal').innerHTML);
                shipping = data.shipping_cost;

                $('#total').html(total + data.shipping_cost);
                $('#shippingAmount').html(data.shipping_cost);
                $('#inputPayment').val(total + data.shipping_cost);
            }
        });
    });
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\D-Mmilitaria-Ecommerce\resources\views/checkout/checkout-index.blade.php ENDPATH**/ ?>