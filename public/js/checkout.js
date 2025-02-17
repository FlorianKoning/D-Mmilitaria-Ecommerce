function paymentMethod(id, shipping = null, serviceCost = null) {
    const subtotal =$('#inputSubtotal').val();
    switch (id) {
        case '1':
            // Displays the check
            $('#paymentMethod1').fadeIn().removeClass('hidden');
            $('#paymentMethod2').fadeOut().addClass('hidden');
            $('#paymentMethod3').fadeOut().addClass('hidden');

            // Changes the pricing
            $('#shippingCost').fadeIn().removeClass('hidden');
            $('#shippingCost').removeAttr('style');
            $('#total').html("€"+(Number(subtotal) + 5));
            $('#inputPayment').attr('value', subtotal + 5);
            break;
        case '2':
            // Displays the check
            $('#paymentMethod2').fadeIn().removeClass('hidden');
            $('#paymentMethod2').removeAttr('style');
            $('#paymentMethod1').fadeOut().addClass('hidden');
            $('#paymentMethod3').fadeOut().addClass('hidden');

            // Changes the pricing
            $('#shippingCost').fadeOut().addClass('hidden');
            $('#total').html("€"+(subtotal));
            $('#inputPayment').attr('value', subtotal);
            break;
        case '3':
            // Displays the check
            $('#paymentMethod3').fadeIn().removeClass('hidden');
            $('#paymentMethod1').fadeOut().addClass('hidden');
            $('#paymentMethod2').fadeOut().addClass('hidden');

            // Changes the pricing
            $('#shippingCost').fadeIn().removeClass('hidden');
            $('#shippingCost').removeAttr('style');
            $('#total').html("€"+(Number(subtotal) + 5));
            $('#inputPayment').attr('value', subtotal + 5);
            break;

        default:
            $('#paymentMethod1').fadeIn().removeClass('hidden');
            $('#paymentMethod2').fadeOut().addClass('hidden');
            $('#paymentMethod3').fadeOut().addClass('hidden');
            break;
    }
}
