@props(['paymentValue'])

<dl class="space-y-6 border-t border-gray-200 px-4 py-6 sm:px-6">
    <div class="flex items-center justify-between">
        <dt class="text-sm">Subtotal</dt>
        <dd id="subtotal" class="text-sm font-medium text-gray-900">€{{ $paymentValue }}</dd>
        <input id="inputSubtotal" type="hidden" value="{{ $paymentValue }}">
    </div>
    <div id="shippingCost" class="flex items-center justify-between">
        <dt class="text-sm">Verzend kosten</dt>
        <dd class="text-sm font-medium text-gray-900">$5.00</dd>
    </div>
    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
        <dt class="text-base font-medium">Total</dt>
        <dd id="total" class="text-base font-medium text-gray-900">€{{ $paymentValue + 5 }}</dd>
        <input id="inputPayment" type="hidden" value="{{ $paymentValue }}">
    </div>
</dl>
