<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('providers', App\Http\Controllers\ProviderController::class);
Route::get('pages/contracts/create/{id}', [App\Http\Controllers\ContractController::class, 'create'])->name('add_contract');

Route::resource('products', App\Http\Controllers\ProductController::class);

Route::resource('contracts', App\Http\Controllers\ContractController::class);
Route::get('pages/products/create/{id}', [App\Http\Controllers\ProductController::class, 'create'])->name('add_products');

Route::get('pages/activity', [App\Http\Controllers\ActivityController::class, 'index'])->name('activity');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
