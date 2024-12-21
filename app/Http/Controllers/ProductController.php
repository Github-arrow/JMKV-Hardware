<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
        $products = $product;
        
        // $product = Product::orderBy('created_at', 'DESC')->paginate(5);
 
        return view('admin/product', compact('product'));
    }

    public function create()
    {
        return view('admin/product');
    }
 
    public function store(Request $request)
    {
        Product::create($request->all());

        return redirect('/admin/product')->with('success', 'Product added successfully');
    }
 
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
 
        return view('admin/product', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
 
        return view('admin/product', compact('product'));
    }
 
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
 
        $product->update($request->all());
 
        return redirect('/admin/product')->with('success', 'product updated successfully');
    }
 
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
 
        $product->delete();
 
        return redirect('/admin/product')->with('success', 'product deleted successfully');
    }

    public function getProductByCode($productCode)
{
    $product = Product::where('product_code', $productCode)->first();
    
    if ($product) {
        return response()->json([
            'product_name' => $product->brand,
            'price' => $product->price
        ]);
    }

    return response()->json(['error' => 'Product not found'], 404);
}

public function searchProducts($query)
    {
        $products = Product::where('category', 'like', $query.'%')
                   ->orWhere('brand', 'like', $query.'%')
                   ->get(['product_code', 'category', 'brand', 'price']);
                   
        return response()->json($products);
    }
}
