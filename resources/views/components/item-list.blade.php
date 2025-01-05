<div class="">
    <div>
      <!--
        Mobile filter dialog

        Off-canvas menu for mobile, show/hide based on off-canvas menu state.
      -->
      <div class="hidden relative z-40 lg:hidden" role="dialog" aria-modal="true">
        <!--
          Off-canvas menu backdrop, show/hide based on off-canvas menu state.

          Entering: "transition-opacity ease-linear duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "transition-opacity ease-linear duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-black/25" aria-hidden="true"></div>

        <div class="fixed inset-0 z-40 flex">
          <!--
            Off-canvas menu, show/hide based on off-canvas menu state.

            Entering: "transition ease-in-out duration-300 transform"
              From: "translate-x-full"
              To: "translate-x-0"
            Leaving: "transition ease-in-out duration-300 transform"
              From: "translate-x-0"
              To: "translate-x-full"
          -->
          <div class="relative ml-auto flex size-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-6 shadow-xl">
            <div class="flex items-center justify-between px-4">
              <h2 class="text-lg font-medium text-gray-900">Filters</h2>
              <button type="button" class="relative -mr-2 flex size-10 items-center justify-center p-2 text-gray-400 hover:text-gray-500">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Close menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <!-- Filters -->
            <form class="mt-4">
              <div class="border-t border-gray-400 pb-4 pt-4">
                <fieldset>
                  <legend class="w-full px-2">
                    <!-- Expand/collapse section button -->
                    <button type="button" class="flex w-full items-center justify-between p-2 text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                      <span class="text-sm font-medium text-gray-900">Color</span>
                      <span class="ml-6 flex h-7 items-center">
                        <!--
                          Expand/collapse icon, toggle classes based on section open state.

                          Open: "-rotate-180", Closed: "rotate-0"
                        -->
                        <svg class="size-5 rotate-0 transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                          <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                      </span>
                    </button>
                  </legend>
                  <div class="px-4 pb-2 pt-4" id="filter-section-0">
                    <div class="space-y-6">
                      <div class="flex gap-3">
                        <div class="flex h-5 shrink-0 items-center">
                          <div class="group grid size-4 grid-cols-1">
                            <input id="color-0-mobile" name="color[]" value="white" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                              <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </div>
                        </div>
                        <label for="color-0-mobile" class="text-sm text-gray-500">White</label>
                      </div>
                      <div class="flex gap-3">
                        <div class="flex h-5 shrink-0 items-center">
                          <div class="group grid size-4 grid-cols-1">
                            <input id="color-1-mobile" name="color[]" value="beige" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                              <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </div>
                        </div>
                        <label for="color-1-mobile" class="text-sm text-gray-500">Beige</label>
                      </div>
                      <div class="flex gap-3">
                        <div class="flex h-5 shrink-0 items-center">
                          <div class="group grid size-4 grid-cols-1">
                            <input id="color-2-mobile" name="color[]" value="blue" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                              <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </div>
                        </div>
                        <label for="color-2-mobile" class="text-sm text-gray-500">Blue</label>
                      </div>
                      <div class="flex gap-3">
                        <div class="flex h-5 shrink-0 items-center">
                          <div class="group grid size-4 grid-cols-1">
                            <input id="color-3-mobile" name="color[]" value="brown" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                              <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </div>
                        </div>
                        <label for="color-3-mobile" class="text-sm text-gray-500">Brown</label>
                      </div>
                      <div class="flex gap-3">
                        <div class="flex h-5 shrink-0 items-center">
                          <div class="group grid size-4 grid-cols-1">
                            <input id="color-4-mobile" name="color[]" value="green" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                              <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </div>
                        </div>
                        <label for="color-4-mobile" class="text-sm text-gray-500">Green</label>
                      </div>
                      <div class="flex gap-3">
                        <div class="flex h-5 shrink-0 items-center">
                          <div class="group grid size-4 grid-cols-1">
                            <input id="color-5-mobile" name="color[]" value="purple" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                              <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                          </div>
                        </div>
                        <label for="color-5-mobile" class="text-sm text-gray-500">Purple</label>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
            </form>
          </div>
        </div>
      </div>

      {{-- main display --}}
      <main class="mx-auto max-w-full px-4 lg:max-w-full lg:px-8">
        <div class="border-b border-gray-400 pb-10">
          <h1 class="text-4xl font-bold tracking-tight text-gray-900">Nieuwe Producten</h1>
          <p class="mt-4 text-base text-gray-500">Hier vind u de nieuwste producten.</p>
        </div>

        <div class="pb-24 pt-12 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
          <aside>
            <h2 class="sr-only">Filters</h2>

            <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
            <button type="button" class="inline-flex items-center lg:hidden">
              <span class="text-sm font-medium text-gray-700">Filters</span>
              <svg class="ml-1 size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
              </svg>
            </button>

            <div class="hidden lg:block">
                <form class="space-y-10 divide-y divide-gray-200">
                    <div class="pt-10">
                      <fieldset>
                        <legend class="block text-sm font-medium text-gray-900">Category</legend>
                        <div class="space-y-3 pt-6">
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="category-0" name="category[]" value="new-arrivals" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="category-0" class="text-sm text-gray-600">All New Arrivals</label>
                          </div>
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="category-1" name="category[]" value="tees" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="category-1" class="text-sm text-gray-600">Tees</label>
                          </div>
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="category-2" name="category[]" value="crewnecks" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="category-2" class="text-sm text-gray-600">Crewnecks</label>
                          </div>
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="category-3" name="category[]" value="sweatshirts" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="category-3" class="text-sm text-gray-600">Sweatshirts</label>
                          </div>
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="category-4" name="category[]" value="pants-shorts" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="category-4" class="text-sm text-gray-600">Pants &amp; Shorts</label>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                    <div class="pt-10">
                      <fieldset>
                        <legend class="block text-sm font-medium text-gray-900">Sizes</legend>
                        <div class="space-y-3 pt-6">
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="sizes-0" name="sizes[]" value="xs" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="sizes-0" class="text-sm text-gray-600">XS</label>
                          </div>
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="sizes-1" name="sizes[]" value="s" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="sizes-1" class="text-sm text-gray-600">S</label>
                          </div>
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="sizes-2" name="sizes[]" value="m" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="sizes-2" class="text-sm text-gray-600">M</label>
                          </div>
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="sizes-3" name="sizes[]" value="l" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="sizes-3" class="text-sm text-gray-600">L</label>
                          </div>
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="sizes-4" name="sizes[]" value="xl" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="sizes-4" class="text-sm text-gray-600">XL</label>
                          </div>
                          <div class="flex gap-3">
                            <div class="flex h-5 shrink-0 items-center">
                              <div class="group grid size-4 grid-cols-1">
                                <input id="sizes-5" name="sizes[]" value="2xl" type="checkbox" class="col-start-1 row-start-1 appearance-none rounded border border-gray-400 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-400 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto">
                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                  <path class="opacity-0 group-has-[:checked]:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  <path class="opacity-0 group-has-[:indeterminate]:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </div>
                            <label for="sizes-5" class="text-sm text-gray-600">2XL</label>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                </form>
            </div>
          </aside>

          <section aria-labelledby="product-heading" class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
            <h2 id="product-heading" class="sr-only">Products</h2>

            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">

              <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-400 bg-white">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/90/M1helmetshell.jpg" alt="Helm" class="aspect-[3/4] bg-gray-200 object-cover group-hover:opacity-75 sm:h-96">
                <div class="flex flex-1 flex-col space-y-2 p-4">
                  <h3 class="text-sm font-medium text-gray-900">
                    <a href="#">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Lorem ipsum dolor sit amet.
                    </a>
                  </h3>
                  <p class="text-sm text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, debitis!</p>
                  <div class="flex flex-1 flex-col justify-end">
                    <p class="text-sm italic text-gray-500">8 colors</p>
                    <p class="text-base font-medium text-gray-900">$256</p>
                  </div>
                </div>
              </div>


              <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-400 bg-white">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Duitse_militaire_Stahlhelm_M.35%2C_grijsgroen_met_rijkswapen%2C_leren_binnenhelm_en_kinriem_met_gesp_050551.JPG/1200px-Duitse_militaire_Stahlhelm_M.35%2C_grijsgroen_met_rijkswapen%2C_leren_binnenhelm_en_kinriem_met_gesp_050551.JPG" alt="Helm" class="aspect-[3/4] bg-gray-200 object-cover group-hover:opacity-75 sm:h-96">
                <div class="flex flex-1 flex-col space-y-2 p-4">
                  <h3 class="text-sm font-medium text-gray-900">
                    <a href="#">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Lorem, ipsum dolor.
                    </a>
                  </h3>
                  <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, inventore?</p>
                  <div class="flex flex-1 flex-col justify-end">
                    <p class="text-sm italic text-gray-500">Black</p>
                    <p class="text-base font-medium text-gray-900">$32</p>
                  </div>
                </div>
              </div>

              <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-400 bg-white">
                <img src="https://www.therupturedduck.com/cdn/shop/files/RD_112624_0508_large.jpg?v=1734457619" alt="Front of plain black t-shirt." class="aspect-[3/4] bg-gray-200 object-cover group-hover:opacity-75 sm:h-96">
                <div class="flex flex-1 flex-col space-y-2 p-4">
                  <h3 class="text-sm font-medium text-gray-900">
                    <a href="#">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Lorem ipsum dolor sit.
                    </a>
                  </h3>
                  <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, eligendi.</p>
                  <div class="flex flex-1 flex-col justify-end">
                    <p class="text-sm italic text-gray-500">Black</p>
                    <p class="text-base font-medium text-gray-900">$32</p>
                  </div>
                </div>
              </div>

              <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-400 bg-white">
                <img src="https://www.warrelics.eu/forum/attachments/field-equipment-accessories-third-reich/1591102d1655215057-critique-my-mannequin-feldwebel-field-display-dsc_7385.jpg" alt="Front of plain black t-shirt." class="aspect-[3/4] bg-gray-200 object-cover group-hover:opacity-75 sm:h-96">
                <div class="flex flex-1 flex-col space-y-2 p-4">
                  <h3 class="text-sm font-medium text-gray-900">
                    <a href="#">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Basic Tee
                    </a>
                  </h3>
                  <p class="text-sm text-gray-500">Look like a visionary CEO and wear the same black t-shirt every day.</p>
                  <div class="flex flex-1 flex-col justify-end">
                    <p class="text-sm italic text-gray-500">Black</p>
                    <p class="text-base font-medium text-gray-900">$32</p>
                  </div>
                </div>
              </div>

              <!-- More products... -->
            </div>
          </section>
        </div>
      </main>
    </div>
  </div>


