<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Api\OfferApiController;

//Web routes
Route::get('/', [OfferController::class, 'index'])->name('offers.index');
Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');
Route::post('/offers/store', [OfferController::class, 'store'])->name('offers.store');
Route::delete('/offers/{id}', [OfferController::class, 'destroy'])->name('offers.destroy');

// Route for API
Route::get('/api/offers', [OfferApiController::class, 'index']);