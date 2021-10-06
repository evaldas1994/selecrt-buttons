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
    Route::resource('accounts', \App\Http\Controllers\AccountController::class);
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('registers1', \App\Http\Controllers\Modules\Register1Controller::class);
    Route::resource('registers2', \App\Http\Controllers\Modules\Register2Controller::class);
    Route::resource('registers3', \App\Http\Controllers\Modules\Register3Controller::class);
    Route::resource('registers4', \App\Http\Controllers\Modules\Register4Controller::class);
    Route::resource('r5s', \App\Http\Controllers\R5Controller::class);
    Route::resource('registers6', \App\Http\Controllers\Modules\Register6Controller::class);
    Route::resource('registers7', \App\Http\Controllers\Modules\Register7Controller::class);
    Route::resource('registers8', \App\Http\Controllers\Modules\Register8Controller::class);
    Route::resource('sales', \App\Http\Controllers\SaleController::class);
    Route::resource('stocks', \App\Http\Controllers\StockController::class);
    Route::resource('stores', \App\Http\Controllers\Modules\StoreController::class);
    Route::resource('system-params', \App\Http\Controllers\Modules\ParamController::class);
    Route::resource('units', \App\Http\Controllers\UnitController::class);
    Route::resource('user-params', \App\Http\Controllers\Modules\UserParamController::class);
    Route::resource('vats', \App\Http\Controllers\Modules\VatController::class);
});

