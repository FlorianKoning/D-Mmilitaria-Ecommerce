@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-logoBackground focus:ring-logoBackground rounded-md shadow-sm']) }}>
