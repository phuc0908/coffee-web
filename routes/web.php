<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;


Route::prefix("")->group(function () {
    Route::get('/', [HomeController::class, "index"])->name("index");
    Route::get('/about', [HomeController::class, 'showAbout'])->name('about');
    Route::get('/contact', [HomeController::class, 'showContact'])->name('contact');
});


Route::prefix("admin")->group(function () {
    Route::get('/', [DashboardController::class, "index"])->name("admin.index");
    Route::get('/table', [DashboardController::class, "table"])->name("admin.table");
});
