<x-app-layout>
    {{-- update --}}
    <form action="{{url('/admin/product')}}" method="POST">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-semibold text-xl" id="editProductModalLabel">Edit Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Add your form here -->
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter product name" value="{{$product->first()->name}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Product Price</label>
                                            <input type="number" name="price" class="form-control" placeholder="Enter product price" value="{{$product->first()->price}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" value="{{$product->first()->quantity}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Code</label>
                                            <input type="number" name="product_code" class="form-control" placeholder="Enter code" value="{{$product->first()->product_code}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <input type="text" name="description" class="form-control" placeholder="Enter description" value="{{$product->first()->description}}">
                                        </div>
                                        <!-- Add more form fields as needed -->
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</x-app-layout>