@props(['paymentValue'])

<dl class="space-y-6 border-t border-gray-200 px-4 py-6 sm:px-6">
    <div class="flex items-center justify-between">
        <dt class="text-sm">Subtotal</dt>
        <div class="flex flex-row">
            <dd class="text-sm font-medium text-gray-900">€</dd>
            <dd id="subtotal" class="text-sm font-medium text-gray-900">{{ (isset($paymentValue)) ? $paymentValue : session('totalPrice') }}</dd>
        </div>
        <input id="inputSubtotal" type="hidden" value="{{ $paymentValue }}">
    </div>
    <div id="shippingCost" class="flex items-center justify-between">
        <dt class="text-sm">Shipping Cost</dt>
        <div class="flex flex-row">
           <dd class="text-sm font-medium text-gray-900">€</dd>
           <dd id="shippingAmount" class="text-sm font-medium text-gray-900">5.00</dd>
        </div>
    </div>
    <div class="border-t border-gray-200 pt-4">
        <div class="flex items-center justify-between">
            <dt class="text-base font-medium text-gray-900">Total</dt>
            <div class="flex flex-row">
                <dd class="text-base font-bold text-gray-900">€</dd>
                <dd id="total" class="text-base font-bold text-gray-900">{{ $paymentValue }}</dd>
            </div>
        </div>
        <input id="inputPayment" name="paymentAmount" type="hidden" value="{{ $paymentValue }}">
        <p class="text-xs text-gray-500 float-right">(Extra service cost with Mollie)</p>
    </div>
</dl>
