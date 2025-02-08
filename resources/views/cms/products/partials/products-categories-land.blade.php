{{-- basic Catagories table --}}
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Land categorieën link</h1>
        <p class="mt-2 text-sm text-gray-700">Hier kunt u het product linken aan de land categorieën</p>
      </div>
    </div>

    <form method="POST" action="{{ route('cms.products.extraCategorieStore', [$product->id, 'land']) }}">
        @csrf
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div>
                        <button type="submit" class="float-right block rounded-md bg-logoBackground px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-[#3C8DBC] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#3C8DBC]">
                            {{ __('Submit') }}
                        </button>
                        <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
                        @foreach ($landCategories as $item)
                            <fieldset class="border-b border-t border-gray-200">
                                <legend class="sr-only">Notifications</legend>
                                <div class="divide-y divide-gray-200">
                                    <div class="relative flex gap-3 pb-4 pt-3.5">
                                            <div class="min-w-0 flex-1 text-sm/6">
                                            <label for="comments" class="font-medium text-gray-900">{{ $item->name }}</label>
                                        </div>
                                        <div class="flex h-6 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="comments" aria-describedby="comments-description" {{ $productCategoriesLinked::exists($item->id, $product->id) ? 'checked' : '' }} name="categories[{{ $item->id }}]" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-logoBackground checked:bg-logoborder-logoBackground indeterminate:border-logoBackground indeterminate:bg-logoborder-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logoborder-logoBackground disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                                    <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


{{-- warning model --}}
<x-warning-modal :catagory="__('catagory')" />


{{-- notifications --}}
@if (session()->has('productCategorieEmpty'))
<x-session-succes :sessionText="session('productCategorieEmpty')" :title="__('Geen categorie geselecteerd!')" />
@endif

@if (session()->has('productCategorieDelete'))
<x-session-succes :sessionText="session('productCategorieDelete')" :title="__('Categorie Verwijderd')" />
@endif

@if (session()->has('productCategorieLink'))
<x-session-succes :sessionText="session('productCategorieLink')" :title="__('Categorie aangemaakt')" />
@endif
