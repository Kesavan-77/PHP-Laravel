<?php

namespace App\Http\Controllers\customer;

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
        $allVehicles = Vehicle::with('user')->paginate(8);

        // Return view with vehicles data
        return view('customer.all-vehicle')->with('vehicles', $allVehicles);
    }

    /**
     * Display the specified vehicle.
     *
     * @param  string  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function getVehicle($id)
    {
        // Find vehicle by UUID and load associated user information
        $vehicle = Vehicle::with('user')->where('uuid', $id)->first();

        // Return view with vehicle data
        return view('customer.show-vehicle')->with('vehicle', $vehicle);
    }
}
