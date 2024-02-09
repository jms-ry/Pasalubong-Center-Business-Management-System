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
        Session::flash('status', 'Access denied. You are already logged in.');
        return back();
    }
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers');
Route::get('/suppliers', [App\Http\Controllers\SupplierController::class, 'index'])->name('suppliers');
Route::get('/product-inventory', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/accounts', [App\Http\Controllers\UserController::class, 'index'])->name('accounts');