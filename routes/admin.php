<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');
//rutas de brand
Route::resource('brands', BrandController::class)->names('admin.brands');
//rutas de category 
Route::resource('categories', CategoryController::class)->names('admin.categories');
//rutas de subcategory
Route::resource('subcategories', SubcategoryController::class)->names('admin.subcategories');
//rutas de product
Route::resource('products', ProductController::class)->names('admin.products');
//rutas de users
Route::resource('users', UserController::class)->names('admin.users');
// rutas de roles
Route::resource('roles', RoleController::class)->names('admin.roles');