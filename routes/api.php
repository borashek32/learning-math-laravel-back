<?php

use App\Http\Controllers\v1\Company\CompanyController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
//    Route::group(['company', 'middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'companies'], function () {
        Route::get('/', [CompanyController::class, 'getCompanyCoordinates']);
    });
});
