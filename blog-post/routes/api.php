<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\API\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//api
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('brands', BrandController::class);

//ugnjezdeni resursi

//proizvodi od jednog brenda
Route::get('/brands/{id}/products', [BrandProductController::class, 'index'])->name('brands.products.index');

//proizvodi jednog korisnika
Route::get('/users/{id}/products', [UserProductController::class, 'index'])->name('users.products.index');


//registracija
Route::post('/register', [AuthController::class, 'register']);

//login
Route::post('/login', [AuthController::class, 'login']);

//grupne rute, zasticene sanctumom
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    //parcijalne rute
    Route::resource('products', ProductController::class)->only(['update', 'store', 'destroy']);

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
