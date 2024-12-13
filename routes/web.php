<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
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
});

//AdminMiddleware

Route::middleware(['auth','adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
    
});