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
Route::get('pages/providers/trashed', [App\Http\Controllers\ProviderController::class, 'onlyTrashedProviders'])->name('trashed_providers');
Route::get('pages/providers.restore/{id}', [App\Http\Controllers\ProviderController::class, 'restoreProviders'])->name('restore_providers');
Route::get('pages/providers/permanentlyDelete/{id}', [App\Http\Controllers\ProviderController::class, 'permanentlyDeleteProviders'])->name('permanently_delete_providers');

Route::resource('products', App\Http\Controllers\ProductController::class);
Route::get('pages/products/trashed', [App\Http\Controllers\ProductController::class, 'onlyTrashedProducts'])->name('trashed_products');
Route::get('pages/products.restore/{id}', [App\Http\Controllers\ProductController::class, 'restoreProducts'])->name('restore_products');
Route::get('pages/products/permanentlyDelete/{id}', [App\Http\Controllers\ProductController::class, 'permanentlyDeleteProducts'])->name('permanently_delete_products');

Route::resource('contracts', App\Http\Controllers\ContractController::class);
Route::get('pages/products/create/{id}', [App\Http\Controllers\ProductController::class, 'create'])->name('add_products');
Route::get('pages/contracts/trashed', [App\Http\Controllers\ContractController::class, 'onlyTrashedContracts'])->name('trashed_contracts');
Route::get('pages/contracts.restore/{id}', [App\Http\Controllers\ContractController::class, 'restoreContracts'])->name('restore_contracts');
Route::get('pages/contracts/permanentlyDelete/{id}', [App\Http\Controllers\ContractController::class, 'permanentlyDeleteContracts'])->name('permanently_delete_contracts');

Route::get('pages/activities/activity', [App\Http\Controllers\ActivityController::class, 'index'])->name('activity');
Route::get('pages/activities/list/{model_type}', [App\Http\Controllers\ActivityController::class, 'getActivity'])->name('list_activity');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
