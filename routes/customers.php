<?php

use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
    Route::get('/customer/create', [CustomersController::class, 'create'])->name('customer.create');
    Route::get('/customer/edit/{customerId}', [CustomersController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/store', [CustomersController::class, 'store'])->name('customer.store');
    Route::put('/customer/update/{id}', [CustomersController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{customerId}', [CustomersController::class, 'delete'])->name('customer.destroy');
});
