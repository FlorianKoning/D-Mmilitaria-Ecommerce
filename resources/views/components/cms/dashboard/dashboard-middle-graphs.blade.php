@props(['profitChart', 'dateOptions', 'exportOptions'])

<div class="py-12 w-full h-screen">
    <div class="flex flex-row ">
        <div class="w-2/3 sm:px-6 lg:px-8 space-y-6 h-max">
            <div id="firstParent" class="flex flex-col p-8 bg-white shadow rounded-2xl transition duration-300 ease-in-out max-h-full">
                <div class="flex flex-row justify-between">
                    {{-- title --}}
                    <div class="my-auto">
                        <h1 class="text-logoBackground text-xl font-bold">verkoopprestaties</h1>
                    </div>

                    <div class="flex flex-row gap-4">
                        {{-- Export Data --}}
                        <div class="grid grid-cols-1">
                            <select id="shippingCountry" name="shippingCountry" class="mt-1 block w-36 rounded-full bg-white border-[#808080] px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
                                @foreach ($exportOptions as $key => $exportOption)
                                    <option value="{{ $key }}">{{ $exportOption }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Date options --}}
                        <div class="grid grid-cols-1">
                            <select id="shippingCountry" name="shippingCountry" class="mt-1 block w-36 rounded-full bg-white border-[#808080] px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
                                @foreach ($dateOptions as $key => $dateOption)
                                    <option value="{{ $key }}">{{ $dateOption }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </div>

                <div class="" id="chartDiv">
                    {{-- <canvas id="profitChart"></canvas> --}}
                </div>
            </div>
        </div>


        <div class="w-1/3 sm:px-6 lg:px-8 space-y-6">
            <div id="firstParent" class="flex flex-col p-8 bg-white shadow rounded-2xl transition duration-300 ease-in-out max-h-full">
                <div class="flex flex-row justify-between">
                    {{-- title --}}
                    <div class="my-auto">
                        <h1 class="text-logoBackground text-xl font-bold">Top Verkochte Categorieën</h1>
                    </div>
                </div>

                <div class="h-1/3" id="chartDiv">
                    {{-- <canvas id="profitChart"></canvas> --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- chart configs --}}
<script>
    // profit chart
    var ctx = document.getElementById('profitChart').getContext('2d');
    var employeeChart = new Chart(ctx, {
        data: {
            datasets: [{
                type: 'line',
                label: 'Earnings',
                data: [7547, 1645, 2856, 6957],
                fill: true,
                tension: 0.1,
                borderColor: '#17191e',
            }, {
                type: 'line',
                label: 'Costs',
                data: [6200, 500, 1500, 4500],
                fill: true,
                tension: 0.1,
                borderColor: '#808080',
            }],
            labels: ['January', 'February', 'March', 'April'],
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Chatagorie chart
    var ctx = document.getElementById('donutChart').getContext('2d');
    var employeeChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Duitsland', 'Nederland'],
            datasets: [{
                label: 'Aankopen',
                data: [3, 6],
                backgroundColor: ['#17191e', '#808080'],
                cutout: '80%',
                borderRadius: 20
           }]
        },
        options: {
            
        }
    });
</script>
