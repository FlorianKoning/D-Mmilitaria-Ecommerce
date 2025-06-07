<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['profitChart']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['profitChart']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="py-12">
    <div class="w-full h-full flex flex-row">
        
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


<script>
    // profit chart
    var ctx = document.getElementById('profitChart').getContext('2d');
    var employeeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($profitChart['labels'], 15, 512) ?>,
            datasets: [
                {
                    label: 'Uren per medewerker',
                    data: <?php echo json_encode($profitChart['data'], 15, 512) ?>,
                    backgroundColor: <?php echo json_encode($profitChart['backgroundColor'], 15, 512) ?>,
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
<?php /**PATH C:\wamp64\www\dbmMilitaria\resources\views/components/cms/dashboard/dashboard-middle-graphs.blade.php ENDPATH**/ ?>