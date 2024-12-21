<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index() {
        return view('inventory');
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $results = DB::table('inventory')
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('inventory', ['results' => $results]);
    }


}
