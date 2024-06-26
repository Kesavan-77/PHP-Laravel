<?php

use App\Http\Controllers\Owner\ActionController;
use App\Http\Controllers\Owner\AllDriverListController;
use App\Http\Controllers\Owner\NotificationController;
use App\Http\Controllers\Owner\VehicleController;
use Illuminate\Support\Facades\Route;

Route::prefix('owner')->middleware(['auth', 'check.owner.auth'])->group(function () {
    // Route for vehicle resource management
    Route::resource('vehicle', VehicleController::class);

    // Route to fetch all drivers available to the owner
    Route::get('/all-drivers', [AllDriverListController::class, 'getAllDrivers'])->name('allDrivers');

    // Route to fetch notifications for the owner
    Route::get('/notifications', [NotificationController::class, 'index'])->name('owner.notifications');

    // Route to handle actions related to trips (approve/reject)
    Route::post('/trip-action', [ActionController::class, 'actionEvent'])->name('owner.actionEvent');
});
