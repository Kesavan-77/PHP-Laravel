<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define the web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// Redirect root URL to the login page
Route::get('/', function () {
    return redirect('login');
});

// Dashboard route for authenticated users
Route::get('/dashboard', function () {

    // Retrieve the authenticated user
    $user = User::find(Auth::id());
    
    // Determine the user's role
    $userRole = $user->user_role;

    // Redirect based on user role
    if ($userRole == 'owner') {
        return redirect()->route('vehicle.index'); 
    }
    
    elseif ($userRole == 'driver') {
        return redirect()->route('registration.index'); 
    }
    elseif ($userRole == 'customer') {
        return redirect()->route('allVehicles'); 
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Include authentication routes (login, register, reset password, etc.)
require __DIR__ . '/auth.php';

// Include routes specific to owner role
require __DIR__ . '/paths/owner.php';

// Include routes specific to driver role
require __DIR__ . '/paths/driver.php';

// Include routes specific to customer role
require __DIR__ . '/paths/customer.php';
