<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve vehicles owned by the authenticated owner, ordered by latest update
        $vehicles = Vehicle::where('user_id', Auth::id())->latest('updated_at')->get();
        
        // Return view with vehicles data for the owner dashboard
        return view('owner.dashboard')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return view for creating a new vehicle
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\VehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        // Validate incoming request data
        $validatedData = $request->validated();

        // Generate UUID if not provided
        if (!$request->uuid) {
            $validatedData['uuid'] = Str::uuid();
        }

        // Handle vehicle image upload
        $file = $request->file('vehicle_img');
        $destination = "storage/vehicle";
        $file->move($destination, $file->getClientOriginalName());
        $validatedData['vehicle_img'] = $file->getClientOriginalName();

        // Create new vehicle record
        Vehicle::create($validatedData);

        // Redirect to vehicle index route with success message
        return redirect()->route('vehicle.index')
            ->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        // Return view showing details of a specific vehicle
        return view('owner.show', ['vehicle' => $vehicle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        // Return view for editing a specific vehicle
        return view('owner.edit', ['vehicle' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'vehicle_no' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:100',
            'vehicle_status' => 'required|string|in:Active,Inactive',
            'person_count' => 'required|integer|min:1|max:50',
            'vehicle_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vehicle_charge' => 'required|numeric|min:0',
        ]);

        // Update vehicle details
        $vehicle->update([
            'vehicle_no' => $validatedData['vehicle_no'],
            'vehicle_type' => $validatedData['vehicle_type'],
            'vehicle_status' => $validatedData['vehicle_status'],
            'person_count' => $validatedData['person_count'],
            'vehicle_charge' => $validatedData['vehicle_charge'],
        ]);

        // Handle vehicle image update if provided
        if ($request->hasFile('vehicle_img')) {
            $file = $request->file('vehicle_img');
            $destination = "storage/vehicle";
            $file->move($destination, $file->getClientOriginalName());
            $vehicle->update(['vehicle_img' => $file->getClientOriginalName()]);
        }

        // Redirect to vehicle show route with success message
        return redirect()->route('vehicle.show', $vehicle)
            ->with('success', 'Vehicle details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        // Delete the vehicle record
        $vehicle->delete();

        // Redirect to vehicle index route with success message
        return redirect()->route('vehicle.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
