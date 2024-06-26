<?php

use App\Http\Controllers\customer\AllVehicleListController;
use App\Http\Controllers\customer\TripDetailsController;
use App\Http\Controllers\customer\NotificationController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->middleware(['auth', 'check.customer.auth'])->group(function () {
    // Route to fetch trip details form for a specific ID
    Route::get('get-form/{id}', [TripDetailsController::class, 'index'])->name('trip.index');

    // Route to fetch all vehicles available
    Route::get('/all-vehicles', [AllVehicleListController::class, 'getAllVehicles'])->name('allVehicles');

    // Route to show details of a specific vehicle by ID
    Route::get('/show-vehicle/{id}', [AllVehicleListController::class, 'getVehicle'])->name('showVehicle');

    // Route to store customer trip details
    Route::post('/customer-trip-details', [TripDetailsController::class, 'store'])->name('trip.store');

    // Route to fetch customer's trip plans
    Route::get('/customer-trip-plans', [TripDetailsController::class, 'yourTripPlans'])->name('trip.plans');

    // Route to fetch notifications for the customer
    Route::get('/notifications', [NotificationController::class, 'index'])->name('customer.notifications');
});
