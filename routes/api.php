<?php

use App\Http\Controllers\API\ProductCategoryConstroller;
use App\Http\Controllers\API\ProductConstroller;
use App\Http\Controllers\API\TransactionConstroller;
use App\Http\Controllers\API\UserConstroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('products', [ProductConstroller::class, 'all']);
Route::get('categories', [ProductCategoryConstroller::class, 'all']);

Route::post('register', [UserConstroller::class, 'register']);
// Route::post('login', [UserConstroller::class, 'login']);
Route::post('login', [UserConstroller::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserConstroller::class, 'fetch']);
    Route::post('user', [UserConstroller::class, 'updateProfile']);
    Route::post('logout', [UserConstroller::class, 'logout']);

    Route::get('transaction', [TransactionConstroller::class, 'all']);
    Route::post('checkout', [TransactionConstroller::class, 'checkout']);
});
