<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('vats', \App\Http\Controllers\VatController::class);
    Route::resource('sales', \App\Http\Controllers\SaleController::class);
    Route::resource('units', \App\Http\Controllers\UnitController::class);
    Route::resource('stocks', \App\Http\Controllers\StockController::class);
    Route::resource('stores', \App\Http\Controllers\StoreController::class);
    Route::resource('r1s', \App\Http\Controllers\R1Controller::class);
});

