<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard',[ShopController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin',function(){
    return 'welcome admin';
})->middleware('admin.email');

Route::get('/list_products',[ProductsController::class,'list_products'])->name('list_products');

Route::get('/add_product',[ProductsController::class,'add_product'])->name('add_product');
Route::post('/add_product',[ProductsController::class,'stor_product'])->name('products.store');
Route::delete('/add_product/{id}',[ProductsController::class,'drop_products'])->name('delete_product');
Route::get('/list_products/{product}/edit',[ProductsController::class, 'form_edit_product'])->name('form_edit_product');
Route::patch('/list_products/{product}/edit',[ProductsController::class,'update_product'])->name('update_product');

Route::get('dashboard/list_orders',[OrderController::class,'show_order'])->name('list_orders');
Route::post('/dashboard/{product}',[OrderController::class,'add_order'])->middleware(['auth'])
->name('add_order');

Route::post('/list_products/{product}',[OrderController::class,'add_order'])->name('add_order')->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
