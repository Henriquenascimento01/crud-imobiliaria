<?php

use App\Http\Controllers\PropertiesController;
use Illuminate\Support\Facades\Route;


Route::get('/properties', [PropertiesController::class, 'index'])->name('properties.index');
Route::post('/property/create', [PropertiesController::class, 'create'])->name('property.create');
Route::put('/property/update', [PropertiesController::class, 'update'])->name('property.update');
Route::delete('/property/delete', [PropertiesController::class, 'delete'])->name('property.delete');