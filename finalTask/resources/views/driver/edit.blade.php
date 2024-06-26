<x-driver-layout>
    <div class="min-h-screen flex items-center justify-center py-6 px-6">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg border-2 border-black-500">
            <!-- Section for editing driver information -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Driver Information</h2>
            
            <!-- Form for updating driver details -->
            <form action="{{ route('registration.update', $driver) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT') <!-- Specify method as PUT for updates -->

                <input type="hidden" id="user_id" name="user_id" value="{{ $driver->user_id }}">

                <!-- Driver Name Input -->
                <div>
                    <label for="driver_name" class="block text-gray-700">Driver Name</label>
                    <input type="text" id="driver_name" name="driver_name"
                        class="form-input w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ old('driver_name', $driver->driver_name) }}">
                    @error('driver_name')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Driver Phone Number Input -->
                <div>
                    <label for="driver_ph_number" class="block text-gray-700">Driver Phone Number</label>
                    <input type="text" id="driver_ph_number" name="driver_ph_number"
                        class="form-input w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ old('driver_ph_number', $driver->driver_ph_number) }}">
                    @error('driver_ph_number')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Driver Experience Input -->
                <div>
                    <label for="driver_experience" class="block text-gray-700">Driver Experience (years)</label>
                    <input type="number" id="driver_experience" name="driver_experience"
                        class="form-input w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ old('driver_experience', $driver->driver_experience) }}">
                    @error('driver_experience')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Driver Charge Input -->
                <div>
                    <label for="driver_charge" class="block text-gray-700">Driver Charge (per day)</label>
                    <input type="number" id="driver_charge" name="driver_charge"
                        class="form-input w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ old('driver_charge', $driver->driver_charge) }}">
                    @error('driver_charge')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Driver Gender Select -->
                <div>
                    <label for="driver_gender" class="block text-gray-700">Driver Gender</label>
                    <select id="driver_gender" name="driver_gender"
                        class="form-select w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="" disabled
                            {{ old('driver_gender', $driver->driver_gender) == '' ? 'selected' : '' }}>Select Gender
                        </option>
                        <option value="male"
                            {{ old('driver_gender', $driver->driver_gender) == 'male' ? 'selected' : '' }}>Male
                        </option>
                        <option value="female"
                            {{ old('driver_gender', $driver->driver_gender) == 'female' ? 'selected' : '' }}>Female
                        </option>
                        <option value="other"
                            {{ old('driver_gender', $driver->driver_gender) == 'other' ? 'selected' : '' }}>Other
                        </option>
                    </select>
                    @error('driver_gender')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Driver Age Input -->
                <div>
                    <label for="driver_age" class="block text-gray-700">Driver Age</label>
                    <input type="number" id="driver_age" name="driver_age"
                        class="form-input w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ old('driver_age', $driver->driver_age) }}">
                    @error('driver_age')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Driver License Upload -->
                <div>
                    <label for="driver_license" class="block text-gray-700">Driver License</label>
                    <input type="file" id="driver_license" name="driver_license"
                        class="form-input w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('driver_license')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                    @if ($driver->driver_license)
                        <p class="text-green-600 mt-1">Existing License: {{ basename($driver->driver_license) }}</p>
                    @endif
                </div>

                <!-- Driver Vehicle Type Selection -->
                <div>
                    <label for="vehicle_type" class="block text-gray-700">Vehicle Type</label>
                    <div class="space-y-2 mt-1">
                        @php
                            $selectedVehicleTypes = old(
                                'vehicle_type',
                                is_string($driver->vehicle_type)
                                    ? explode(',', $driver->vehicle_type)
                                    : $driver->vehicle_type,
                            );
                        @endphp

                        <label class="inline-flex items-center">
                            <input type="checkbox" name="vehicle_type[]" value="car"
                                class="form-checkbox text-indigo-600"
                                {{ in_array('car', $selectedVehicleTypes) ? 'checked' : '' }}>
                            <span class="ml-2">Car</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="vehicle_type[]" value="truck"
                                class="form-checkbox text-indigo-600 ml-2"
                                {{ in_array('truck', $selectedVehicleTypes) ? 'checked' : '' }}>
                            <span class="ml-2">Truck</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="vehicle_type[]" value="motorcycle"
                                class="form-checkbox text-indigo-600 ml-2"
                                {{ in_array('motorcycle', $selectedVehicleTypes) ? 'checked' : '' }}>
                            <span class="ml-2">Motorcycle</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="vehicle_type[]" value="suv"
                                class="form-checkbox text-indigo-600 ml-2"
                                {{ in_array('suv', $selectedVehicleTypes) ? 'checked' : '' }}>
                            <span class="ml-2">SUV</span>
                        </label>
                    </div>
                    @error('vehicle_type')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Update Driver
                        Info</button>
                </div>
            </form>
        </div>
    </div>
</x-driver-layout>
