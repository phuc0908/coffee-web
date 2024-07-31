<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ProductController;

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

    // -------------------------------------------------------------------------------------------------------> PRODUCTs
    Route::prefix("product")->group(function () {
        Route::get('/', [ProductController::class, "create"])->name("admin.product.index");
        Route::post('/add', [ProductController::class, 'store'])->name("admin.product.add");
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    });

    // -------------------------------------------------------------------------------------------------------> STOCK
    Route::prefix("stock")->group(function () {
        Route::get('/', [StockController::class, "create"])->name("admin.stock.index");
        Route::post('/add', [MaterialController::class, 'store'])->name("admin.stock.add");
        Route::get('edit/{id}', [StockController::class, 'edit'])->name('admin.stock.edit');
        Route::post('update/{id}', [StockController::class, 'update'])->name('admin.stock.update');
        Route::delete('destroy/{id}', [StockController::class, 'destroy'])->name('admin.stock.delete');
    });

    // -------------------------------------------------------------------------------------------------------> EMPLOYEEs
    Route::prefix("employee")->group(function () {
        Route::get('/', [EmployeeController::class, "create"])->name("admin.employee.index");
        Route::post('/add', [EmployeeController::class, 'store'])->name("admin.employee.add");
        Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
        Route::post('update/{id}', [EmployeeController::class, 'update'])->name('admin.employee.update');
        Route::delete('destroy/{id}', [EmployeeController::class, 'destroy'])->name('admin.employee.delete');
    });

    // -------------------------------------------------------------------------------------------------------> EMPLOYEEs
    Route::prefix("report")->group(function () {
        Route::get('/', [ReportController::class, "create"])->name("admin.report.index");
        Route::post('/add', [ReportController::class, 'store'])->name("admin.report.add");
        Route::get('edit/{id}', [ReportController::class, 'edit'])->name('admin.report.edit');
        Route::post('update/{id}', [ReportController::class, 'update'])->name('admin.report.update');
        Route::delete('destroy/{id}', [ReportController::class, 'destroy'])->name('admin.report.delete');
    });
});
