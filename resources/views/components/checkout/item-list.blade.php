@props(['cart'])

<ul role="list" class="divide-y divide-gray-200">
    @if ($cart != null)
        @foreach ($cart as $item)
            <li class="flex px-4 py-6 sm:px-6">
                <div class="shrink-0">
                    <img src="{{ $item->main_image }}" alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
                </div>

                <div class="ml-6 flex flex-1 flex-col">
                    <div class="flex">
                        <div class="min-w-0 flex-1">
                            <h4 class="text-sm font-medium text-gray-700 hover:text-gray-800">{{ $item->name }}</h4>
                        </div>
                    </div>
                    <div class="flex flex-1 items-end justify-between pt-2">
                        <p class="mt-1 text-xs font-medium text-gray-500">Hoeveelheid: {{ $item->amount }}</p>
                    </div>
                    <div class="flex flex-1 items-end justify-between pt-2">
                        <x-discount-price :item="$item" :textSize="__('xs')" />
                    </div>
                </div>
            </li>
            <input type="hidden" name="items[{{ $item->id }}]" value="{{ $item->amount }}">
        @endforeach
    @endif
</ul>
