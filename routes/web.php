<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\EmployeeController;


Route::prefix("")->group(function () {
    Route::get('/', [HomeController::class, "index"])->name("index");
    Route::get('/about', [HomeController::class, 'showAbout'])->name('about');
    Route::get('/contact', [HomeController::class, 'showContact'])->name('contact');
});


Route::prefix("admin")->group(function () {
    Route::get('/', [DashboardController::class, "login"])->name("admin.login");
    Route::get('dashboard', [DashboardController::class, "index"])->name("admin.index");
    Route::get('button', [DashboardController::class, "button"])->name("admin.button");

    // -------------------------------------------------------------------------------------------------------> MATERIALs
    Route::prefix("material")->group(function () {
        Route::get('/', [MaterialController::class, "create"])->name("admin.material.index");
        Route::post('/add', [MaterialController::class, 'store'])->name("admin.material.add");
        Route::get('edit/{id}', [MaterialController::class, 'edit'])->name('admin.material.edit');
        Route::post('update/{id}', [MaterialController::class, 'update'])->name('admin.material.update');
        Route::delete('destroy/{id}', [MaterialController::class, 'destroy'])->name('admin.material.delete');
    });


    Route::prefix("employee")->group(function () {
        Route::get('/', [EmployeeController::class, "create"])->name("admin.employee.index");
        Route::post('/add', [EmployeeController::class, 'store'])->name("admin.employee.add");
        Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
        Route::post('update/{id}', [EmployeeController::class, 'update'])->name('admin.employee.update');
        Route::delete('destroy/{id}', [EmployeeController::class, 'destroy'])->name('admin.employee.delete');
    });
});
