<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardCOntroller;
use App\Http\Controllers\Admin\ParamController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductParentController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardCOntroller::class, 'index'])->name('dashboard')->prefix('admin')->middleware([IsAdminMiddleware::class]);

Route::prefix('admin')->name('admin.')->middleware([IsAdminMiddleware::class])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('product-parents',ProductParentController::class)->parameters(['product-parents' => 'productParents']);
    Route::resource('params', ParamController::class);
    Route::resource('categories', CategoryController::class);
});
