<?php

use Illuminate\Http\Request;
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

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::get('/employes/{department?} ',  [App\Http\Controllers\EmployeController::class, 'get'])->where(['id'=>'[0-9]+']);
    Route::get('/departments',  [App\Http\Controllers\DepartmentController::class, 'get']);

    Route::post('xml', [App\Http\Controllers\EmployeController::class, 'AddData']);
});
