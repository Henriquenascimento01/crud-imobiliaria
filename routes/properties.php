<?php

use App\Http\Controllers\PropertiesController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/properties', [PropertiesController::class, 'index'])->name('properties.index');
    Route::get('/property/create', [PropertiesController::class, 'create'])->name('property.create');
    Route::get('/property/edit/{propertyId}', [PropertiesController::class, 'edit'])->name('property.edit');
    Route::post('/property/store', [PropertiesController::class, 'store'])->name('property.store');
    Route::put('/property/update/{id}', [PropertiesController::class, 'update'])->name('property.update');
    Route::delete('/property/{propertyId}', [PropertiesController::class, 'delete'])->name('property.destroy');
});