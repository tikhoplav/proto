<?php

use App\Http\Controllers\Operations\CreateTransaction;
use App\Http\Controllers\Registries\AccountsChart;
use App\Http\Controllers\Registries\OperationsChart;
use Illuminate\Support\Facades\Route;

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
	//
});