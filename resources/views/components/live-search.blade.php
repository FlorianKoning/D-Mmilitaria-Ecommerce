@props(['table', 'inputName', 'old'])

<div>
    <div class="relative">
        <x-text-input onkeyup="liveSearch(this.value, '{{ $table }}')" id="input" value="{{ (isset($old)) ? $old->name : '' }}" type="text" class="mt-1 w-full" required autofocus autocomplete="project" data-bs-toggle="modal" data-bs-target="#liveSearchModal" />
        <div id="selectBox" class="hidden w-full h-fit bg-white border border-gray-300 rounded-b-md p-2 shadow-sm flex flex-col gap-1">

        </div>
    </div>
    <input id="liveSearchInput" name="{{ $inputName }}" value="{{  (isset($old)) ? $old->id : '' }}" type="hidden">
    <x-input-error class="mt-2" :messages="$errors->get('liveSearchInput')" />
</div>
