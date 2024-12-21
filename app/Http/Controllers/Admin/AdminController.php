<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function index() {

        $totalProducts = Product::count();
        return view('admin.dashboard', compact('totalProducts'));
    }
    
}
