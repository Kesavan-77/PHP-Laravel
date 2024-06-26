<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRegistrationRequest;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DriverRegistrationController extends Controller
{
    /**
     * Display the dashboard for the authenticated driver.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the driver's registration details based on the authenticated user's ID
        $driverRegistration = Driver::where('user_id', Auth::id())->first();

        // Return view with driver's dashboard and registration details
        return view('driver.dashboard')->with('driver', $driverRegistration);
    }

    /**
     * Show the form for creating a new driver resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display the form for creating a new driver registration
        return view('driver.create');
    }

    /**
     * Store a newly created driver resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRegistrationRequest $request)
    {
        // Validate the incoming request data using DriverRegistrationRequest
        $validatedData = $request->validated();

        // Generate UUID if not provided
        if (!$request->uuid) {
            $validatedData['uuid'] = Str::uuid();
        }

        // Handle driver license file upload
        $file = $request->file('driver_license');
        $destination = "storage/driver";
        $file->move($destination, $file->getClientOriginalName());
        $validatedData['driver_license'] = $file->getClientOriginalName();

        // Create a new Driver record in the database
        Driver::create($validatedData);

        // Redirect back to registration index with success message
        return redirect()->route('registration.index')
            ->with('success', 'Driver registered successfully.');
    }

    /**
     * Show the form for editing the specified driver resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the driver by ID for editing
        $driver = Driver::findOrFail($id);

        // Return view with the driver data for editing
        return view('driver.edit', compact('driver'));
    }

    /**
     * Update the specified driver resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriverRegistrationRequest $request, $id)
    {
        // Find the driver by ID
        $driver = Driver::find($id);

        // Validate the incoming request data using DriverRegistrationRequest
        $validatedData = $request->validated();

        // Update driver details in the database
        $driver->update([
            'driver_name' => $validatedData['driver_name'],
            'driver_ph_number' => $validatedData['driver_ph_number'],
            'driver_experience' => $validatedData['driver_experience'],
            'driver_charge' => $validatedData['driver_charge'],
            'driver_age' => $validatedData['driver_age'],
            'driver_gender' => $validatedData['driver_gender'],
            'driver_license' => $validatedData['driver_license']->getClientOriginalName(),
            'vehicle_type' => $validatedData['vehicle_type'],
        ]);

        // Handle driver license file upload
        $file = $request->file('driver_license');
        $destination = "storage/driver";
        $file->move($destination, $file->getClientOriginalName());

        // Redirect back to registration index with success message
        return redirect()->route('registration.index', $driver->id)
            ->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified driver resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the driver by ID and delete it
        $driver = Driver::find($id);
        $driver->delete();

        // Redirect back to registration index with success message
        return redirect()->route('registration.index', $driver->id)
            ->with('success', 'Profile deleted successfully');
    }
}
