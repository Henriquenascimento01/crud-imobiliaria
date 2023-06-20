<?php

use App\Http\Controllers\PropertiesController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/properties', [PropertiesController::class, 'index'])->name('properties.index');
    Route::get('/property/create', [PropertiesController::class, 'create'])->name('property.create');
    Route::get('/property/show/{propertyId}', [PropertiesController::class, 'show'])->name('property.show');
    Route::post('/property/store', [PropertiesController::class, 'store'])->name('property.store');
});