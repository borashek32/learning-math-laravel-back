<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\Company\CompanyController;

Route::get('/', [CompanyController::class, 'index'])->name('index');
