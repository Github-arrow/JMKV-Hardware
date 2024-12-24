<x-app-layout>

    {{-- Create --}}
   <form action="{{url('/admin/product')}}" method="POST">
    {{ csrf_field() }}
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-semibold text-xl" id="addProductModalLabel">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Add your form here -->
                                <form>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="string" name="name" class="form-control" id="productName" placeholder="Enter product name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Product Price</label>
                                        <input type="decimal" name="price" class="form-control" id="productPrice" placeholder="Enter product price">
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="integer" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity">
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_code" class="form-label">Code</label>
                                        <input type="integer" name="product_code" class="form-control" id="product_code" placeholder="Enter code">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="string" name="description" class="form-control" id="product_description" placeholder="Enter description">
                                    </div>
                                    <!-- Add more form fields as needed -->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="font-semibold text-xl mb-0">List of Product</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    Add Product
                </button>
            </div>
        </div>
        <hr>
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif 
        </div>
            <div class="p-6 text-gray-700">
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
                        @if($product->count() > 0)
                            @foreach($product as $rs)
                                <tr class="text-center">
                                    <td class="align-middle">{{ $loop->iteration }}</!td>
                                    <td class="align-middle">{{ $rs->name }}
                                    <td class="align-middle">₱{{ number_format($rs->price, 2) }}</td>
                                    <td class="align-middle">{{ $rs->quantity }}</td>
                                    <td class="align-middle">{{ $rs->product_code }}</td>
                                    <td class="align-middle">{{ $rs->description }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewProductModal{{ $rs->id }}">View</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="viewProductModal{{ $rs->id }}" tabindex="-1" aria-labelledby="viewProductModalLabel{{ $rs->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title font-semibold text-xl" id="viewProductModalLabel{{ $rs->id }}">View Product</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Product Name</label>
                                                                <input type="text" class="form-control" id="productName{{ $rs->id }}" value="{{ $rs->name }}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="price" class="form-label">Product Price</label>
                                                                <input type="text" class="form-control" id="productPrice{{ $rs->id }}" value="{{ $rs->price }}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="quantity" class="form-label">Quantity</label>
                                                                <input type="text" class="form-control" id="quantity{{ $rs->id }}" value="{{ $rs->quantity }}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="product_code" class="form-label">Code</label>
                                                                <input type="text" class="form-control" id="product_code{{ $rs->id }}" value="{{ $rs->product_code }}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">Description</label>
                                                                <input type="text" class="form-control" id="product_description{{ $rs->id }}" value="{{ $rs->description }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateProductModal{{ $rs->id }}">Edit</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="updateProductModal{{ $rs->id }}" tabindex="-1" aria-labelledby="updateProductModalLabel{{ $rs->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title font-semibold text-xl" id="updateProductModalLabel{{ $rs->id }}">Update Product</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('/admin/product', $rs->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{method_field('PUT')}}
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Product Name</label>
                                                                    <input type="string" name="name" class="form-control" id="productName{{ $rs->id }}" value="{{ $rs->name }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="price" class="form-label">Product Price</label>
                                                                    <input type="decimal" name="price" class="form-control" id="productPrice{{ $rs->id }}" value="{{ $rs->price }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="quantity" class="form-label">Quantity</label>
                                                                    <input type="integer" name="quantity" class="form-control" id="quantity{{ $rs->id }}" value="{{ $rs->quantity }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="product_code" class="form-label">Code</label>
                                                                    <input type="integer" name="product_code" class="form-control" id="product_code{{ $rs->id }}" value="{{ $rs->product_code }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="description" class="form-label">Description</label>
                                                                    <input type="string" name="description" class="form-control" id="product_description{{ $rs->id }}" value="{{ $rs->description }}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ url('/admin/product',$rs->id)}}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Are you sure you want to Delete?')">
                                                {{@csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger m-0">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Product not found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mb-4 me-4">
                {{ $product->links() }}
            </div>
        </div>
    </div>

</x-app-layout>