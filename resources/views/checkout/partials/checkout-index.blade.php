<div class="mx-auto max-w-2xl px-4 pb-24 pt-16 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Checkout</h2>

    <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16" method="POST" action="{{ route('payment.index') }}">
        @csrf
        <div>
            {{-- checkout form --}}
            <x-checkout.shipping-form :shipping="$shippingInfo" :provinces="$provinces" />
        </div>

        <!-- Order summary -->
        <x-checkout.checkout-box :cart="$cart" :paymentValue="$paymentValue" :paymentOptions="$paymentOptions" :paymentOptionTranslation="$paymentOptionTranslation" />
    </form>
</div>
