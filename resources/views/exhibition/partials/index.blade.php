<form method="GET" action="{{ route('exhibition.index') }}">
    @csrf

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <h2 class="text-pretty text-xl font-semibold tracking-tight text-navBackground sm:text-2xl mb-1">Militaria fair calendar</h2>
                <p class="text-pretty text-sm tracking-tight text-gray-900 sm:text-base mb-1">Below you can see an overview of all the fairs we will be attending.</p>
        </div>
        <div class="mt-8 flow-root">
          <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <div class="overflow-hidden shadow ring-1 ring-black/5 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <div class="h-16 w-full bg-navBackground sm:rounded-t-lg px-5">
                        <div class="flex flex-row gap-6">
                            <div class="flex flex-row gap-2">
                                <input type="text" name="search" id="search" class="mt-4 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 sm:text-sm/6">
                                <button type="submit" class="mt-4 inline-flex items-center gap-x-1.5 rounded-md bg-gray-400 px-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 cursor-pointer">
                                    Search
                                </button>
                                @if (isset($_GET['search']))
                                    <a href="{{ route('exhibition.index') }}" class="mt-4 inline-flex items-center gap-x-1.5 rounded-md bg-gray-400 px-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 cursor-pointer">
                                        <button type="button">
                                            Clear
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <thead class="bg-navBackground h-9">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Fair name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Fair location</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Fair date</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Starting time</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Closing time</th>
                        </tr>
                    </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($exhibitions as $exhibition)
                        <tr class="even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $exhibition->exhibition_name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $exhibition->exhibition_location }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $exhibition->exhibition_date }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $exhibition->exhibition_opening_time }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $exhibition->exhibition_closing_time }}</td>
                            </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</form>
