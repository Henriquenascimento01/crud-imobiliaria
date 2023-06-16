<?php

use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;


Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
Route::get('/customer/create', [CustomersController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomersController::class, 'store'])->name('customer.store');
Route::put('/customer/update', [CustomersController::class, 'update'])->name('customer.update');
Route::delete('/customer/delete', [CustomersController::class, 'delete'])->name('customer.delete');
