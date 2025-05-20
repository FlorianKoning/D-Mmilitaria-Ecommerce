@props(['paymentOptions', 'paymentOptionTranslation'])

<div class="pt-10">
    <fieldset>
        <legend class="text-lg font-medium text-gray-900">Betalings methodes</legend>
        <x-checkout-input-error class="mt-2" :messages="$errors->get('paymentOptions')" />
        <div class="mt-4 flex flex-col gap-y-6">
            @if ($paymentOptions != null)
                @foreach ($paymentOptions as $option)
                    <label onclick="paymentMethod('{{ $option->id }}')" aria-label="Standard" aria-description="4–10 business days for $5.00" class="relative flex cursor-pointer rounded-lg bg-white p-4 shadow focus:outline-none w-[350px]">
                        <input id="{{ $option->id }}" name="paymentMethod[{{ $option->id }}]"  type="radio" class="sr-only">
                        <span class="flex flex-1">
                            <span class="flex flex-col">
                                <span class="block text-sm font-medium text-gray-900">{{ $paymentOptionTranslation['nl']['payment_name'][$option->payment_name] }}.</span>
                                <span class="mt-1 flex items-center text-sm text-gray-500">{{ $paymentOptionTranslation['nl']['shipping'][$option->shipping] }}.</span>
                                <span class="mt-6 flex items-center text-sm text-gray-900">{{ $paymentOptionTranslation['nl']['shipping_cost'][$option->shipping_cost] }}.</span>
                                @if ($option->extra_service_costs == 1)
                                    <span class="text-sm font-medium text-gray-500">{{ $paymentOptionTranslation['nl']['extra_service_costs'][$option->extra_service_costs] }}.</span>
                                @endif
                            </span>
                        </span>
                        <svg id="paymentMethod{{ $option->id }}" class="size-5 text-navBackground {{ ($option->id != 3) ? 'hidden' : '' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                        </svg>
                        <span class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
                    </label>
                @endforeach
            @endif
        </div>
    </fieldset>
</div>
