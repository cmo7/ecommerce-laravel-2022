<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('front-page', [
        'products' => Product::all(),
    ]);
});

Route::get('/admin', function() {
    return view('admin-page');
});

// Product admin Routes
Route::get('/admin/new-product', [ProductController::class, 'new_form'])->name('new-product-form');
Route::post('/admin/new-product', [ProductController::class, 'create'])->name('create-product');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
