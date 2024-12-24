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
        
        $product = Product::orderBy('created_at', 'DESC')->paginate(5);
 
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
 
        return view('/admin/product', compact('product'));
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
    
}
