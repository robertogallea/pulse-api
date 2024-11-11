<?php

use Illuminate\Support\Facades\Route;
use Robertogallea\PulseApi\Http\Controllers\DashboardController;

Route::prefix(config('pulse-api.route_prefix').'/'.config('pulse-api.path'))
    ->middleware(config('pulse-api.middleware'))
    ->name('api.pulse.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
        Route::get('/{type}', [DashboardController::class, 'show'])
            ->name('resource');
    })
    ->middleware('api');
