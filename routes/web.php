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
    Route::resource('accounts', \App\Http\Controllers\Modules\AccountController::class)->except('show');
    Route::resource('account-groups', \App\Http\Controllers\Modules\AccountGroupController::class)->except('show');
    Route::resource('asset-groups', \App\Http\Controllers\Modules\AssetGroupController::class)->except('show');
    Route::resource('bankAccounts', \App\Http\Controllers\Modules\BankAccountController::class);
    Route::resource('banks', \App\Http\Controllers\Modules\BankController::class)->except('show');
    Route::resource('bank-account-systems', \App\Http\Controllers\Modules\BankAccountSystemController::class)->except('show');
    Route::resource('barcodes', \App\Http\Controllers\Modules\BarcodeController::class);
    Route::resource('blank-numbers', \App\Http\Controllers\Modules\BlankNumberController::class)->except('show');
    Route::resource('budgets', \App\Http\Controllers\Modules\BudgetController::class)->except('show');
    Route::resource('calendars', \App\Http\Controllers\Modules\CalendarController::class)->except('show');
    Route::resource('counters', \App\Http\Controllers\Modules\CounterController::class)->except('show');
    Route::resource('currencies', \App\Http\Controllers\Modules\CurrencyController::class)->except('show');
    Route::resource('custom-reasons', \App\Http\Controllers\Modules\CustomReasonController::class)->except('show');
    Route::resource('departments', \App\Http\Controllers\Modules\DepartmentController::class)->except('show');
    Route::resource('descriptions', \App\Http\Controllers\Modules\DescriptionController::class)->except('show');
    Route::resource('discountsh', \App\Http\Controllers\Modules\DischController::class)->except('show');
    Route::resource('employees', \App\Http\Controllers\Modules\EmployeeController::class)->except('show');
    Route::resource('interests', \App\Http\Controllers\Modules\InterestController::class)->except('show');
    Route::resource('ledger-groups', \App\Http\Controllers\Modules\LedgerGroupController::class)->except('show');
    Route::resource('loyalty-points', \App\Http\Controllers\Modules\LoyaltyPointController::class)->except('show');
    Route::resource('manufacturers', \App\Http\Controllers\Modules\ManufacturerController::class)->except('show');
    Route::resource('markups', \App\Http\Controllers\Modules\MarkupController::class)->except('show');
    Route::resource('messages', \App\Http\Controllers\Modules\MessageController::class);
    Route::resource('message-groups', \App\Http\Controllers\Modules\MessageGroupController::class)->except('show');
    Route::resource('partners', \App\Http\Controllers\Modules\PartnerController::class)->except('show');
    Route::resource('partner-groups', \App\Http\Controllers\Modules\PartnerGroupController::class)->except('show');
    Route::resource('periods', \App\Http\Controllers\Modules\PeriodController::class)->except('show');
    Route::resource('persons', \App\Http\Controllers\Modules\PersonController::class)->except('show');
    Route::resource('production-cards', \App\Http\Controllers\Modules\ProductionCardController::class)->except('show');
    Route::resource('projects', \App\Http\Controllers\Modules\ProjectController::class)->except('show');
    Route::resource('registers1', \App\Http\Controllers\Modules\Register1Controller::class)->except('show');
    Route::resource('registers2', \App\Http\Controllers\Modules\Register2Controller::class)->except('show');
    Route::resource('registers3', \App\Http\Controllers\Modules\Register3Controller::class)->except('show');
    Route::resource('registers4', \App\Http\Controllers\Modules\Register4Controller::class)->except('show');
    Route::resource('registers5', \App\Http\Controllers\Modules\Register5Controller::class)->except('show');
    Route::resource('registers6', \App\Http\Controllers\Modules\Register6Controller::class)->except('show');
    Route::resource('registers7', \App\Http\Controllers\Modules\Register7Controller::class)->except('show');
    Route::resource('registers8', \App\Http\Controllers\Modules\Register8Controller::class)->except('show');
    Route::resource('sales', \App\Http\Controllers\SaleController::class);
    Route::resource('stocks', \App\Http\Controllers\Modules\StockController::class)->except('show');
    Route::resource('stock-groups', \App\Http\Controllers\Modules\StockGroupController::class)->except('show');
    Route::resource('stock-operation-groups', \App\Http\Controllers\Modules\StockOperationGroupController::class)->except('show');
    Route::resource('stores', \App\Http\Controllers\Modules\StoreController::class)->except('show');
    Route::resource('system-params', \App\Http\Controllers\Modules\ParamController::class);
    Route::resource('taxesd', \App\Http\Controllers\Modules\TaxdController::class)->except('show');
    Route::resource('templates', \App\Http\Controllers\Modules\TemplateController::class)->except('show');
    Route::resource('units', \App\Http\Controllers\Modules\UnitController::class)->except('show');
    Route::resource('user-params', \App\Http\Controllers\Modules\UserParamController::class);
    Route::resource('vats', \App\Http\Controllers\Modules\VatController::class);
    Route::resource('work-shedule-templates', \App\Http\Controllers\Modules\WorkSheduleTemplateController::class);

    Route::prefix('stocks/{stock}')->group(function () {
        Route::resource('prices', \App\Http\Controllers\Modules\PriceController::class)->except('show', 'create', 'store');
        Route::get('prices/type/{type}', [App\Http\Controllers\Modules\PriceController::class, 'create'])->name('prices.create');
        Route::post('prices/type/{type}', [App\Http\Controllers\Modules\PriceController::class, 'store'])->name('prices.store');
        Route::resource('joined-stocks', \App\Http\Controllers\Modules\JoinedStockController::class)->except('show', 'index');
    });

    Route::prefix('currencies/{currency}')->group(function () {
        Route::resource('currency-rates', \App\Http\Controllers\Modules\CurrencyRateController::class)->except('show');
    });

    Route::prefix('employees/{employee}')->group(function () {
        Route::resource('bonuses', \App\Http\Controllers\Modules\BonusController::class)->except('show', 'index');
    });

    Route::prefix('partners/{partner}')->group(function () {
        Route::resource('bank-accounts', \App\Http\Controllers\Modules\BankAccountController::class)->except('show', 'index');
        Route::resource('price-partners', \App\Http\Controllers\Modules\PricePartnerController::class)->except('show', 'index');
    });

    Route::prefix('production-cards/{production_card}')->group(function () {
        Route::resource('production-card-components', \App\Http\Controllers\Modules\ProductionCardComponentController::class)->except('show', 'index');
    });
});

Route::domain('blog.' . 'dineta-crm.test')->group(function () {
    Route::get('posts', function () {
        return 'Second subdomain landing page';
    });
    Route::get('post/{id}', function ($id) {
        return 'Post ' . $id . ' in second subdomain';
    });
});

