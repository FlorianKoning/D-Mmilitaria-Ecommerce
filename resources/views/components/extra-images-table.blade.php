@props(['columnNames', 'images', 'id'])

<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Extra fotos tabel</h1>
        <p class="mt-2 text-sm text-gray-700">Hier heeft een een makkelijke overzicht voor al uw extra fotos die u kunt/heeft toegevoeg. <span class="text-blue-600 font-extrabold">Let op!</span> U kunt maar 3 foto's hier oploaden.</p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <button onclick="openModal('extraImages')" type="button" class="block rounded-md bg-logoBackground px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobg-logoBackground">Foto Toevoegen</button>
    </div>
</div>
<div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black/5 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                <tr>
                    @foreach ($columnNames as $column)
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ $column }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($images as $image)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $image->image_url }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $image->image_name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $image->product_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<x-extra-images-modal :id="$id" />
