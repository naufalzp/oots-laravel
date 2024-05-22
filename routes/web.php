<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', [ProductController::class, 'index'])->name('product.index');

Route::get('products/add', [ProductController::class, 'create'])->name('product.create');
Route::post('products/add', [ProductController::class, 'store'])->name('product.store');

Route::get('products/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('product.update');

Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');