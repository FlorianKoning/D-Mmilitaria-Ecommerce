<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['profitChart', 'dateOptions', 'exportOptions']));

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

foreach (array_filter((['profitChart', 'dateOptions', 'exportOptions']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="py-12 w-full h-screen">
    <div class="flex flex-row ">
        <div class="w-2/3 sm:px-6 lg:px-8 space-y-6 h-max">
            <div id="firstParent" class="flex flex-col p-8 bg-white shadow rounded-2xl transition duration-300 ease-in-out max-h-full">
                <div class="flex flex-row justify-between">
                    
                    <div class="my-auto">
                        <h1 class="text-logoBackground text-xl font-bold">verkoopprestaties</h1>
                    </div>

                    <div class="flex flex-row gap-4">
                        
                        <div class="grid grid-cols-1">
                            <select id="shippingCountry" name="shippingCountry" class="mt-1 block w-36 rounded-full bg-white border-[#808080] px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
                                <?php $__currentLoopData = $exportOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $exportOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($exportOption); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="grid grid-cols-1">
                            <select id="shippingCountry" name="shippingCountry" class="mt-1 block w-36 rounded-full bg-white border-[#808080] px-3 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6">
                                <?php $__currentLoopData = $dateOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dateOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($dateOption); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    
                </div>

                <div class="" id="chartDiv">
                    <canvas id="profitChart"></canvas>
                </div>
            </div>
        </div>


        <div class="w-1/3 sm:px-6 lg:px-8 space-y-6">
            <div id="firstParent" class="flex flex-col p-8 bg-white shadow rounded-2xl transition duration-300 ease-in-out max-h-full">
                <div class="flex flex-row justify-between">
                    
                    <div class="my-auto">
                        <h1 class="text-logoBackground text-xl font-bold">Top Verkochte Categorieën</h1>
                    </div>
                </div>

                <div class="h-1/3" id="chartDiv">
                    <canvas id="donutChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


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
<?php /**PATH C:\Users\flori\D-Mmilitaria-Ecommerce\resources\views/components/cms/dashboard/dashboard-middle-graphs.blade.php ENDPATH**/ ?>