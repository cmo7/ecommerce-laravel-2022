<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TagController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StoreController::class, 'front_page'])->name('store');
Route::get('/checkout', [StoreController::class, 'checkout_page'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'cart_to_processing'])->name('process-checkout');

Route::get('/admin', function() {
    return view('admin.front-page');
})->name('admin-page');

// Create Product/Category/Tag admin Routes
Route::get('/admin/new-product', [ProductController::class, 'new_form'])->name('new-product-form');
Route::post('/admin/new-product', [ProductController::class, 'create'])->name('create-product');

Route::get('/admin/new-category', [CategoryController::class, 'new_form'])->name('new-category-form');
Route::post('/admin/new-category', [CategoryController::class, 'create'])->name('create-category');

Route::get('/admin/new-tag', [TagController::class, 'new_form'])->name('new-tag-form');
Route::post('/admin/new-tag', [TagController::class, 'create'])->name('create-tag');

Route::get('/admin/orders', [OrderController::class, 'list'])->name('list-orders');
Route::post('/admin/orders/send', [OrderController::class, 'processing_to_sent'])->name('send-order');


// View Products/Categories/Tags
Route::get('/admin/products', [ProductController::class, 'list'])->name('list-products');
Route::get('/admin/categories', [CategoryController::class, 'list'])->name('list-categories');
Route::get('/admin/tags', [TagController::class, 'list'])->name('list-tags');


// Product public Routes
Route::get('/product/{slug}',[ProductController::class, 'show'])->name('show-product');
Route::post('/product/add/{id}', [ProductController::class, 'add_to_cart'])->name('product-add-to-cart');

Route::get('/dashboard', function () {
    return redirect(route('store'));
})->middleware(['auth'])->name('dashboard');

Route::get('/products', function() {
    return Product::all();
});

require __DIR__.'/auth.php';
