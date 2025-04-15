@props(['item', 'textSize' => 'sm'])

@if ($functions::hasDiscount($item))
    <div class="flex flex-row gap-x-1">
        <span class="line-through text-{{ $textSize }} text-red-500">€{{ $item->price }}</span>
        <p class="text-{{ $textSize }} text-gray-900">€{{ $item->price - ($item->price / 100 * $item->discount_percentage) }}</p>
    </div>
@else
    <div class="flex flex-row gap-x-1">
        <p class="text-{{ $textSize }} text-gray-900">€{{ $item->price }}</p>
    </div>
@endif