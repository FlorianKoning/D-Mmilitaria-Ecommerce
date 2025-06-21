@props(['columnNames', 'images', 'id'])

<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold text-gray-900">Extra fotos tabel</h1>
        <p class="mt-2 text-sm text-gray-700">Hier heeft een een makkelijke overzicht voor al uw extra fotos die u kunt/heeft toegevoeg. <span class="text-blue-600 font-extrabold">Let op!</span> U kunt maar 20 foto's hier oploaden.</p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <button onclick="openModal('extraImages')" type="button" class="block rounded-md bg-logoBackground px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-logoBackground focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-logobg-logoBackground">Foto Toevoegen</button>
    </div>
</div>
<div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="shadow ring-1 ring-black/5 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                <tr>
                    @foreach ($columnNames as $column)
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ $column }}</th>
                    @endforeach
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Opties</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($images as $image)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                <img class="h-12 rounded-full" src="{{ $image->image_url }}" alt="{{ $image->image_name }}">
                            </td>
                            <td onclick="toggleInput('{{ $image->id }}')" id="order-{{ $image->id }}" state="closed" class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <span id="orderResult-{{ $image->id }}" class="hover:cursor-pointer hover:underline">{{ ($image->order == null) ? 0 : $image->order }}</span>    
                            
                                <form id="udpateForm-{{ $image->id }}" method="POST" action="{{ route('cms.extraImages.updateOrder', $image->id) }}">
                                    @csrf

                                    <x-text-input onchange="this.form.submit()" id="orderInput-{{ $image->id }}" name="orderInput" type="number" class="mt-1 block w-full hidden" :value="$image->order" />
                                </form>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $image->image_name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $image->product_id }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <x-dropdown align="left" width="32">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-logoBackground focus:outline-none transition ease-in-out duration-150">
                                            <div>Opties</div>
                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        {{-- edit options --}}
                                        <x-dropdown-link>
                                            <button class="flex w-full" onclick="editModal('extraImagesEdit', 'extraImageName', '{{ $image->image_name }}')">{{ __('Edit') }}</button>
                                        </x-dropdown-link>


                                        {{-- delete options --}}
                                        <x-dropdown-link >
                                            <button class="flex w-full" onclick="deleteModel('{{ $image->id }}')">{{ __('Verwijder') }}</button>
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
                            </td>

                            {{-- warning model --}}
                            <x-warning-modal :id="__('warningModel-').$image->id" :catagory="__('extra foto')" :route="route('cms.extraImages.delete', $image->id)" :name="$image->image_name" />

                            {{-- edit modal --}}
                            <x-extra-images-edit-modal :id="$image->id" />
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


<x-extra-images-modal :id="$id" />


<script>
    function toggleInput(imageId) {
        const order = document.getElementById('order-'+imageId);
        const orderResult = document.getElementById('orderResult-'+imageId);
        const orderInput = document.getElementById('orderInput-'+imageId);

        orderResult.classList.add('hidden');
        orderInput.classList.remove('hidden');

        order.setAttribute('state', 'open');
    }
</script>