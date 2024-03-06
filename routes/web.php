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
    else{
        return view('welcome');
    }
})->name('welcome');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('employees', App\Http\Controllers\EmployeeController::class)->except(['show', 'create','edit']);
    Route::resource('customers', App\Http\Controllers\CustomerController::class)->except(['show', 'create','edit']);
    Route::resource('suppliers', App\Http\Controllers\SupplierController::class)->except(['show', 'create','edit']);
    Route::resource('products', App\Http\Controllers\ProductController::class)->except(['show', 'create','edit']);
    Route::resource('accounts', App\Http\Controllers\UserController::class)->except(['show', 'create','edit']);
    Route::get('/logs', [App\Http\Controllers\LogController::class, 'index'])->name('logs');
    Route::get('/sales', [App\Http\Controllers\ReceiptController::class, 'index'])->name('sales');
    Route::get('/dtrs', [App\Http\Controllers\DtrController::class, 'index'])->name('dtrs');
    Route::resource('orders', App\Http\Controllers\OrderController::class)->only(['store']);
    Route::get('/point-of-sale', [App\Livewire\Orders::class, 'render'])->name('point-of-sale');
    Route::post('/point-of-sale', [App\Livewire\Orders::class, 'save'])->name('point-of-sale');
});

