<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class AllDriverListController extends Controller
{
    /**
     * Display a listing of all drivers.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function getAllDrivers()
    {
        // Retrieve all drivers from the database
        $allDrivers = Driver::all();

        // Return view with drivers data for the owner
        return view('owner.all-driver')->with('drivers', $allDrivers);
    }
}
