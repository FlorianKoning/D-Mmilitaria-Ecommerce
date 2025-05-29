@props(['disabled' => false, 'width' => 'full'])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block w-'.$width.' rounded-md bg-[#F3F5F7] border-[#F3F5F7]/80 px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6']) }}>
