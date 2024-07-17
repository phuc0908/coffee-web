<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::prefix("")->group(function () {
    Route::get('/', [HomeController::class, "index"])->name("index");
    Route::get('/about', [HomeController::class, 'showAbout'])->name('about');
    Route::get('/contact', [HomeController::class, 'showContact'])->name('contact');
});
