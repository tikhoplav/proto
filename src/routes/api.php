<?php

use App\Http\Controllers\Operations\CreateTransaction;
use App\Http\Controllers\Registries\AccountsChart;
use App\Http\Controllers\Registries\OperationsChart;
use App\Http\Controllers\Reports\TrialBalance;
use Illuminate\Support\Facades\Route;

// Subconto controllers (api resource)
use App\Http\Controllers\PersonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('operations')->group(function () {
	Route::post('transaction', CreateTransaction::class);
});

Route::prefix('registries')->group(function () {
	Route::get('accounts', AccountsChart::class);
	Route::get('operations', OperationsChart::class);
});

Route::prefix('reports')->group(function () {
	Route::get('trial_balance', TrialBalance::class);
});

Route::apiResources([
    'person' => PersonController::class,
]);