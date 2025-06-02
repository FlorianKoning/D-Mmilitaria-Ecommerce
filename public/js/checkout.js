const shippingCountry = document.getElementById('shippingCountry');

function paymentMethod(id, shipping = null, serviceCost = null) {
    const subtotal =$('#inputSubtotal').val();
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

            $('#total').html(total + data.shipping_cost);
            $('#shippingAmount').html(data.shipping_cost);
            $('#inputPayment').val(total + data.shipping_cost);
        }
    });
});

