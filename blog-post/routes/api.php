<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//api
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('brands', BrandController::class);

//ugnjezdeni resursi

//proizvodi od jednog brenda
Route::get('/brands/{id}/products', [BrandProductController::class, 'index'])->name('brands.products.index');

//proizvodi jednog korisnika
Route::get('/users/{id}/products', [UserProductController::class, 'index'])->name('users.products.index');
