<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5 mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white text-center">Total Sales</div>
                    <div class="card-body">
                        {{-- <h1 class="text-center font-semibold text-xl text-success mt-3 mb-3">₱{{ number_format($totalSales, 2) }}</h1> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
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
</x-app-layout>
