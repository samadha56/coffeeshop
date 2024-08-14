<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index']);

Route::prefix('category')->controller(CategoryController::class)->group(function () {
    Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
});
