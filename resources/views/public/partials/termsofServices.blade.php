<section>
    <div class="bg-white py-12 sm:py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
            <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Terms of Services – {{ env('APP_NAME') }}</h1>
            <div class="mt-10 grid max-w-xl grid-cols-1 gap-8 text-base/7 text-gray-700 lg:max-w-none lg:grid-cols-2">
            {{-- Row 1 --}}
              <div>
                <p>
                    <span class="font-semibold">1. Company Information</span>
                    <br>
                    DBM Militaria is a registered company specializing in the sale of original military collectibles.
                    <br>
                    Contact: <span class="font-semibold">{{ $business->business_email }}</span>
                    <br>
                    KvK-nummer: <span class="font-semibold">{{ $business->kvk_number }}</span>
                    <br>
                    BTW-nummer: <span class="font-semibold">{{ $business->btw_number }}</span>
                    <br>
                    Business address:: <span class="font-semibold">{{ $business->business_address }}</span>
                </p>

                <p class="mt-8">
                    <span class="font-semibold">3. Product Information</span>
                    <br>
                    DBM Militaria sells only original military collectibles, unless stated otherwise. All items are historical in nature and sold solely for collecting and educational purposes. 
                    We explicitly distance ourselves from any use of these objects in contexts that promote hatred or discrimination.
                </p>
              </div>

            {{-- Row 2 --}}
              <div>
                <p>
                    <span class="font-semibold">2. Applicability</span>
                    <br>
                    These terms and conditions apply to every offer made by DBM Militaria and to every agreement established between DBM Militaria and the customer, 
                    whether through the website or other channels.
                </p>

                <p class="mt-[105px]">
                    <span class="font-semibold">4. Ordering</span>
                    <br>
                    Orders can be placed through our website. Customers may create an account for easier future purchases, but this is not required. Orders can also be completed as a guest.
                </p>
              </div>

              {{-- Row 3 --}}
              <div>
                <p>
                    <span class="font-semibold">5. Payment</span>
                    <br>
                    Payment must be completed in full before shipment. We accept the payment methods listed on our website. Prices include VAT, unless stated otherwise.
                </p>

                <p class="mt-8">
                    <span class="font-semibold">7. Return Policy</span>
                    <br>
                    You have the right to withdraw from the purchase within 14 days of receiving your order.
                    <br>
                    <br>
                    Return conditions:
                    <br>
                    &emsp;– The item must be returned in the same condition as it was received: undamaged and unaltered.
                    <br>
                    &emsp;– Return shipping costs are the responsibility of the customer, unless the return is due to an error on our part.
                    <br>
                    &emsp;– Refunds will be processed within 14 days after receipt and inspection of the returned item.
                </p>
              </div>

              {{-- Row 4 --}}
              <div>
                <p>
                    <span class="font-semibold">6. Shipping Policy</span>
                    <br>
                    We ship worldwide. Shipping costs, as well as any import duties or taxes for international shipments, are the responsibility of the customer.
                     Orders are shipped within 2–5 business days after payment has been received, unless otherwise communicated.
                </p>
                <p class="mt-8">
                    <span class="font-semibold">8. Liability</span>
                    <br>
                    DBM Militaria is not liable for any damage resulting from the use of the sold products. Our items are collectables and not intended for practical use.
                </p>
              </div>

              {{-- Row 5 --}}
              <div>
                <p>
                    <span class="font-semibold">9. Privacy</span>
                    <br>
                    We respect your privacy. Personal data is used solely for processing orders and will not be shared with third parties without your consent. 
                    For more details, see our <a class="italic font-bold border-black hover:border-b-2" href="{{ route('public.privacy') }}">privacy policy</a>.
                </p>
              </div>
              <div>
                <p>
                    <span class="font-semibold">10. Disputes  </span>
                    <br>
                    These terms are governed by Dutch law. Disputes should preferably be resolved through mutual consultation. If that fails, disputes may be submitted to the competent court in the Netherlands.
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
