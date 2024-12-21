<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//UserMiddleware

Route::middleware(['auth','userMiddleware'])->group(function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('inventory', [InventoryController::class, 'index'])->name('user.inventory');
    Route::get('pos', [UserController::class, 'pos'])->name('user.pos');
});

//AdminMiddleware

Route::middleware(['auth','adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    Route::get('/admin/product',[ProductController::class, 'index'])->name('admin.product');
    Route::post('/admin/product',[ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product',[ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/product/{id}', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/admin/product/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::patch('/admin/product/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
  
    
    
    

    Route::get('/admin/inventory', [InventoryController::class, 'index'])->name('admin.inventory');


    Route::get('/admin/sale', [SaleController::class, 'index'])->name('admin.sale');
    Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order');
    Route::get('/admin/product',[ProductController::class, 'index'])->name('admin.product');

    Route::get('/admin/product/search', [ProductController::class, 'search'])->name('admin.product.search');
    Route::get('/admin/inventory/search', [InventoryController::class, 'search'])->name('admin.inventory.search');
    Route::get('/admin/sale/search', [SaleController::class, 'search'])->name('admin.sale.search');
    Route::get('/admin/order/search', [OrderController::class, 'search'])->name('admin.order.search');
    
});