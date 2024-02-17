<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        Session::flash('warning', 'Access denied. You are already logged in.');
        return back();
    }
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('employees', App\Http\Controllers\EmployeeController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::resource('suppliers', App\Http\Controllers\SupplierController::class);
    Route::get('/logs', [App\Http\Controllers\LogController::class, 'index'])->name('logs');
    Route::get('/product-inventory', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/accounts', [App\Http\Controllers\UserController::class, 'index'])->name('accounts');
    Route::get('/sales', [App\Http\Controllers\ReceiptController::class, 'index'])->name('sales');
    Route::get('/dtrs', [App\Http\Controllers\DtrController::class, 'index'])->name('dtrs');
    Route::get('/point-of-sale', [App\Http\Controllers\PosController::class, 'index'])->name('point-of-sale');
});

