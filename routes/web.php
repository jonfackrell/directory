<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Ad Routes
Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])
    ->middleware('can:update,App\Ad')
    ->name('ad.edit');
Route::put('/ads/{ad}', [AdController::class, 'update'])
    ->middleware('can:update,App\Ad')
    ->name('ad.update');

// Category Routes
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->middleware('can:update,App\Category')
    ->name('category.edit');

// Company Routes
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])
    ->middleware('can:update,App\Company')
    ->name('company.edit');

// Product Routes
Route::get('/detail/{slug}', [ProductController::class, 'show'])
        ->name('detail');
Route::get('/detail/{product}/edit', [ProductController::class, 'edit'])
        ->middleware('can:update,App\Product')
        ->name('product.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])
    ->middleware('can:update,App\Product')
    ->name('product.update');

// User Routes
Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->middleware('can:update,App\User')
    ->name('user.edit');

Auth::routes(['verify' => true]);



