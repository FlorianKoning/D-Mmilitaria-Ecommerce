@props(['paymentValue', 'cart'])

<div class="mt-10 lg:mt-0">
    <h2 class="text-lg font-medium text-gray-900">Bestelling</h2>

    <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
        {{-- checkout item list --}}
        <x-checkout.item-list :cart="$cart" />

        {{-- payment methods --}}
        <x-checkout.checkout-cost :paymentValue="$paymentValue" />

        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
            <button type="submit" class="w-full rounded-md border border-transparent bg-navBackground px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-navBackground focus:outline-none focus:ring-2 focus:ring-navbg-navBackground focus:ring-offset-2 focus:ring-offset-gray-50">Confirm order</button>
        </div>
    </div>
</div>
