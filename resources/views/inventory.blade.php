<x-app-layout>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="font-semibold text-xl mb-0">Inventory</h1>
                        <form method="GET" action="{{ route('inventory.search') }}" class="mb-0">
                            <div class="flex items-center">
                                <input type="text" name="query" placeholder="Search inventory..." class="form-input rounded-md shadow-sm mt-1">
                                <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-priamry rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="p-6 text-gray-700">
                    <h1 class="mb-0">View all <span class="font-semibold">Inventory</span></h1>
                    <br>
                    +
                    <table class="table table-striped">
                        <thead class="table-primary text-white">
                            <tr class="text-center">
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Code</th>
                                <th scope="col">Description</th>
                                <th scope="col">Available Stock</th>
                                {{-- <th scope="col">Sold</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr class="text-center">
                                <td>{{ $product->name }}</td>
                                <td>₱{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->description }}</td>
                                <td class="text-success font-semibold">{{ $product->quantity - ($product->sold ?? 0) }}</td>
                                {{-- <td class="text-danger font-semibold">{{ $product->sold ?? 0 }}</td> --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>

</x-app-layout>