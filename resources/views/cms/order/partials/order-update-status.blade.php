<section>
    <header class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-base font-semibold text-gray-900">Bestelling Bewerken</h1>  
          <p class="mt-2 text-sm text-gray-700">Hier heb je de form voor het bewerken van de gekozen bestelling.</p>
        </div>
    </header>

    <form method="post" action="{{ route('cms.order.udpate', $order->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data" >
        @csrf
        @method('PUT')

        {{-- order status --}}
        <div>
            <label for="order_status" class="block text-sm/6 font-medium text-gray-900">Bestellings status</label>
            <div class="mt-2 grid grid-cols-1">
              <select id="order_status" name="order_status" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach ($orderStatuses as $orderStatus)
                    <option value="{{ $orderStatus->id }}">{{ $orderStatus['status'] }}</option>
                @endforeach
              </select>
              <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
              </svg>
            </div>
        </div>

        {{-- Submit Button --}}
        <div class="flex items-center gap-4">
          <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form> 
</section>


<input class="bg-blue-600 bg-sky-500 bg-amber-500 bg-purple-500 bg-yellow-300 bg-red-600 bg-emerald-400" type="hidden">