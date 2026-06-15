<?php

use App\Http\Controllers\DeadlockController;
use Illuminate\Support\Facades\Route;

Route::controller(DeadlockController::class)->group(function () {
    Route::get('/', 'home')->name('deadlock.home');
    Route::get('/info/{category?}', 'info')->name('deadlock.info');
    Route::get('/news', 'news')->name('deadlock.news');
});
