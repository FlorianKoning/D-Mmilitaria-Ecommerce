@props(['profitChart'])

<div class="py-12">
    <div class="w-full h-full flex flex-row">
        {{-- total sales --}}
        <div class="w-2/3 sm:px-6 lg:px-8 space-y-6">
            <div id="firstParent" class="p-8 h-40 bg-white shadow rounded-2xl transition duration-300 ease-in-out">
                <div class="h-full w-full flex flex-col justify-between bg-red-600">
                    <canvas id="profitChart"></canvas>
                </div>
            </div>
        </div>


        <div class="w-1/3 sm:px-6 lg:px-8 space-y-6">
            <div id="secondParent"
                class="p-8 h-40 bg-white hover:bg-logoBackground hover:text-white shadow rounded-2xl transition duration-300 ease-in-out">
                <div class="h-full w-full flex flex-col justify-between">
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
        type: 'bar',
        data: {
            labels: @json($profitChart['labels']),
            datasets: [
                {
                    label: 'Uren per medewerker',
                    data: @json($profitChart['data']),
                    backgroundColor: @json($profitChart['backgroundColor']),
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            parsing: {
                yAxisKey: 'hours'
            },
            plugins: {
                title: {
                    display: true,
                    text: "Default: Deze week",
                    position: 'top',
                    align: 'start',
                },
                legend: {
                    position: 'top',
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                },
            }
        }
    });
</script>
