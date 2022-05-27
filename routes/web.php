<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EnviarAvisoController;
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

// rutas de productos
Route::get('/',[ProductController::class,'index'])->name('product.index');
Route::get('product/{product}',[ProductController::class,'show'])->name('product.show');
Route::put('product/{presentation}',[ProductController::class,'updateStock'])->name('product.updateStock');
Route::put('product/stock/{product}',[ProductController::class,'updatestockProduct'])->name('product.updatestockproduct');

// rutas de categorias
Route::get('category/{category}',[ProductController::class,'category'])->name('product.category');

Route::get('subcategory/{subcategory}',[ProductController::class,'subcategory'])->name('product.subcategory');
//enviar correo
Route::get('enviarcorreo/{product}/{user}', [EnviarAvisoController::class, 'store'])->name('enviarcorreo.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
