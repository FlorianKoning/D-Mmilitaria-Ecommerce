<x-app-layout>
    <div class="w-full broder border-t-2 border-black/80 flex flex-col content-start">
        <div class="py-12">
            @include('checkout.partials.checkout-index')
        </div>
    </div>

    @if (session()->has('duplicateOrder'))
        <x-session-warning :sessionText="session('duplicateOrder')" />
    @endif

    @if (session()->has('erorr'))
        <x-session-warning :sessionText="session('error')" />
    @endif

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
</x-app-layout>
