<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTripDetailsRequest;
use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TripDetailsController extends Controller
{
    /**
     * Display the dashboard with details of a specific vehicle.
     *
     * @param  string  $vehicle
     * @return \Illuminate\Contracts\View\View
     */
    public function index($vehicle)
    {
        // Find the vehicle by UUID
        $vehicle = Vehicle::where('uuid', $vehicle)->firstOrFail();

        // Return view with vehicle details
        return view('customer.dashboard')->with('vehicle', $vehicle);
    }

    /**
     * Store trip details submitted by the user.
     *
     * @param  StoreTripDetailsRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTripDetailsRequest $request)
    {
        // Validate the incoming request
        $validated = $request->validated();

        // Initialize proof path variable
        $proofPath = null;

        // Store the proof file if uploaded
        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('proofs', 'public');
        }

        // Create a new Trip record
        $trip = Trip::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'vehicle_id' => $validated['vehicle_id'],
            'from_date' => $validated['from-date'],
            'to_date' => $validated['to-date'],
            'from_location' => $validated['from-location'],
            'to_locations' => json_encode($request->input('to-location', [])),
            'vehicle_no' => $validated['vehicle_no'],
            'driver' => $validated['driver'],
            'proof_image' => $proofPath,
            'trip_description' => $validated['trip-description'],
        ]);

        // Redirect back with success message
        return redirect()->route('allVehicles')->with('success', 'Your trip application has been submitted successfully. You will receive your status soon!');
    }

    /**
     * Display the user's trip plans.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function yourTripPlans()
    {
        // Fetch all trip plans of the authenticated user
        $getPlans = Trip::where('user_id', Auth::id())->get();

        // Return view with trip plans data
        return view('customer.your-plans')->with('plans', $getPlans);
    }
}
