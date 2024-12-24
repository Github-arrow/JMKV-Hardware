<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function viewInventory() {
        $products = Product::all();
        return view('inventory', compact('products'));
    }

    public function pos(){
        return view('pos');
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
