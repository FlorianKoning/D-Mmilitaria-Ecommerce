<fieldset>
    <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Betalingsmethoden</h2>
    <div class="mt-4 divide-y divide-gray-200 border-b border-t border-gray-200">
        @foreach ($paymentOptions as $payment)
            <div class="relative flex gap-3 py-4">
                <div class="min-w-0 flex-1 text-sm/6">
                    <label for="{{ $payment->id }}" class="select-none font-medium text-gray-900">{{ $paymentTranslation[$payment->payment_name] }}</label>
                </div>
                <div class="flex h-6 shrink-0 items-center">
                    <div class="group grid size-4 grid-cols-1">
                        <input id="{{ $payment->id }}" name="paymentOption[{{ $payment->payment_name }}]" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-navBackground checked:bg-navbacborder-navBackground indeterminate:border-navBackground indeterminate:bg-navbacborder-navBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-navbacborder-navBackground disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                        <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                            <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</fieldset>
