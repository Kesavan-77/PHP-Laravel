<?php

use App\Http\Controllers\driver\AllVehicleListController;
use App\Http\Controllers\driver\DriverRegistrationController;
use App\Http\Controllers\driver\NotificationController;
use Illuminate\Support\Facades\Route;

Route::prefix('driver')->middleware(['auth', 'check.driver.auth'])->group(function () {
    // Route for driver registration resource
    Route::resource('registration', DriverRegistrationController::class);

    // Route to fetch all vehicles available to the driver
    Route::get('/all-vehicles', [AllVehicleListController::class, 'getAllVehicles'])->name('driver.allVehicles');

    // Route to show details of a specific vehicle available to the driver
    Route::get('/show-vehicle/{id}', [AllVehicleListController::class, 'getVehicle'])->name('driver.showVehicle');

    // Route to fetch notifications for the driver
    Route::get('/notifications', [NotificationController::class, 'index'])->name('driver.notifications');
});
