<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Assessment1Controller;
use App\Http\Controllers\Assessment2Controller;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('assessment1')->name('assessment1.')->group(function () {
    Route::resource('/', Assessment1Controller::class)->parameters(['' => 'user']);
});

Route::prefix('assessment2')->name('assessment2.')->group(function () {
    Route::resource('/', Assessment2Controller::class)->parameters(['' => 'category']);
});