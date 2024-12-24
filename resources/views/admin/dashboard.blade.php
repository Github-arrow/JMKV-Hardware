<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5 mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">Total Products</div>
                    <div class="card-body">
                        <h1 class="text-center font-semibold text-xl text-primary mt-3 mb-3">{{ $totalProducts }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-white text-center">Total Sales</div>
                    <div class="card-body">
                        {{-- <h1 class="text-center font-semibold text-xl text-success mt-3 mb-3">₱{{ number_format($totalSales, 2) }}</h1> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning text-white text-center">Total Sold</div>
                    <div class="card-body">
                        {{-- <h1 class="text-center font-semibold text-xl text-warning mt-3 mb-3">{{ $totalSold }}</h1> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Current Inventory</h2>
                    
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product Statistics</h2>
                        <canvas id="productChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sales Statistics</h2>
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Order Statistics</h2>
                    <canvas id="orderChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script>
        const productCtx = document.getElementById('productChart').getContext('2d');
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const orderCtx = document.getElementById('orderChart').getContext('2d');

        const productChart = new Chart(productCtx, {
            type: 'bar',
            data: {
                labels: @json($productLabels),
                datasets: [{
                    label: 'Products',
                    data: @json($productData),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            }
        });

        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: @json($salesLabels),
                datasets: [{
                    label: 'Sales',
                    data: @json($salesData),
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            }
        });

        const orderChart = new Chart(orderCtx, {
            type: 'pie',
            data: {
                labels: @json($orderLabels),
                datasets: [{
                    label: 'Orders',
                    data: @json($orderData),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script> --}}

</x-app-layout>