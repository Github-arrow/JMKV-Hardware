<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index() {
        // Fetch all products for inventory
        $products = Product::all();
    
        // Calculate total sold and remaining quantities
        $totalSold = $products->sum(function ($product) {
            return $product->sold ?? 0; // Sum the 'sold' values
        });
    
        $totalRemaining = $products->sum(function ($product) {
            return $product->quantity - ($product->sold ?? 0); // Subtract 'sold' from 'quantity'
        });
        return view('inventory', compact('products', 'totalSold', 'totalRemaining'));
    }

    public function search(Request $request) {
        $query = $request->input('query');

        // Search products by name or description
        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->get();

        // Calculate total sold and remaining quantities for the search results
        $totalSold = $products->sum(function ($product) {
            return $product->sold ?? 0;
        });

        $totalRemaining = $products->sum(function ($product) {
            return $product->quantity - ($product->sold ?? 0);
        });

        return view('inventory', compact('products', 'totalSold', 'totalRemaining'));
    }

}
