<x-app-layout>
    
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="font-semibold text-xl mb-0">Inventory</h1>
                    <form action="{{ route('admin.inventory.search') }}" method="GET" class="d-flex">
                        <input type="text" name="query" class="form-control" placeholder="Search inventory...">
                        <button type="submit" class="btn btn-primary" id="search-box">Search</button>
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

</x-app-layout>