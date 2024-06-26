<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AllVehicleListController extends Controller
{
    /**
     * Display a listing of all vehicles.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function getAllVehicles()
    {
        // Fetch all vehicles with associated user information
        $allVehicles = Vehicle::with('user')->get();

        // Return view with vehicles data for the driver
        return view('driver.all-vehicle')->with('vehicles', $allVehicles);
    }

    /**
     * Display the details of a specific vehicle.
     *
     * @param  string  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function getVehicle($id)
    {
        // Find a vehicle by UUID and load associated user information
        $vehicle = Vehicle::with('user')->where('uuid', $id)->first();

        // Return view with vehicle details for the driver
        return view('driver.show-vehicle')->with('vehicle', $vehicle);
    }
}
