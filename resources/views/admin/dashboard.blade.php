<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <p>+
                        <a href="{{ route('product') }}" class="btn btn-primary">Add Product</a>
                    </p>
                </div> --}}
            </div>
        </div>
    </div>

<div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Inventory</h2>
                    <br>
                    <table class="table table-striped">
                        <thead class="table-primary text-white">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Code</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 </div>
    
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 mb-5">
    <div class="row">
        {{-- <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">Total Products</div>
                <div class="card-body">
                    <h1 class="text-center">Total Product</h1>
                </div>
            </div>
        </div> --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info text-white text-center">Total Product</div>
                <div class="card-body">
                    <ul class="list-group">
                        @if(is_array($totalProducts) || is_object($totalProducts))
                            @foreach($products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $product->name }}
                                    <span class="badge badge-primary badge-pill">{{ $product->quantity }}</span>
                                </li>
                            @endforeach
                        @else
                            <li class="list-group-item">No products available</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">Total Sales</div>
                <div class="card-body">
                    <h1 class="text-center">Total Sales</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning text-white">Total Orders</div>
                <div class="card-body">
                    <h1 class="text-center">Total Orders</h1>
                </div>
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