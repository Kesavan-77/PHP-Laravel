<x-customer-layout>
    <div class="min-h-screen flex items-center justify-center py-6 px-6">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg border-2 border-black-500">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Trip Details</h2>
            <form action="{{ route('trip.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <!-- From Date -->
                <div>
                    <label for="from-date" class="block text-gray-700">From Date</label>
                    <input type="date" id="from-date" name="from-date" value="{{ old('from-date') }}"
                        min="{{ \Carbon\Carbon::now()->addDays(30)->toDateString() }}"
                        class="form-input w-full mt-1 @error('from-date') border-red-500 @enderror">
                    @error('from-date')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- To Date -->
                <div>
                    <label for="to-date" class="block text-gray-700">To Date</label>
                    <input type="date" id="to-date" name="to-date" value="{{ old('to-date') }}"
                        min="{{ \Carbon\Carbon::now()->addDays(30)->toDateString() }}"
                        class="form-input w-full mt-1 @error('to-date') border-red-500 @enderror">
                    @error('to-date')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- From Location -->
                <div>
                    <label for="from-location" class="block text-gray-700">From Location</label>
                    <input type="text" id="from-location" name="from-location" value="{{ old('from-location') }}"
                        placeholder="Enter starting location"
                        class="form-input w-full mt-1 @error('from-location') border-red-500 @enderror">
                    @error('from-location')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                 <!-- To Location Container -->
                 <div>
                    <label class="block text-gray-700">To Location</label>
                    <div id="to-location-container" class="space-y-2">
                        @if (old('to-location'))
                            @foreach (old('to-location') as $index => $toLocation)
                                <div class="flex items-center space-x-2 mt-2">
                                    <input type="text" name="to-location[]" value="{{ $toLocation }}" 
                                        placeholder="Enter destination" class="form-input w-full mt-1 @error('to-location.' . $index) border-red-500 @enderror">
                                    @if ($index > 0)
                                        <button type="button"
                                            class="p-1 bg-red-500 hover:bg-red-700 text-white rounded-full flex items-center justify-center w-8 h-8 delete-button">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                </div>
                                @error('to-location.' . $index)
                                    <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            @endforeach
                        @else
                            <!-- Default first field -->
                            <div class="flex items-center space-x-2 mt-2">
                                <input type="text" name="to-location[]" value=""
                                    placeholder="Enter destination" class="form-input w-full mt-1">
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-location"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 mt-2">Add Another Destination</button>
                </div>

                <!-- Vehicle Selection -->
                <div>
                    <input type="hidden" id="vehicle_no" name="vehicle_no" value="{{ $vehicle->vehicle_no }}"
                        class="form-input w-full mt-1 @error('vehicle_no') border-red-500 @enderror">
                </div>

                <!-- Vehicle_id selection -->
                <div>
                    <input type="hidden" id="vehicle_id" name="vehicle_id" value="{{ $vehicle->id }}"
                        class="form-input w-full mt-1 @error('vehicle_no') border-red-500 @enderror">
                </div>

                <!-- Driver Selection -->
                <div>
                    <label for="driver" class="block text-gray-700">Do you need a driver</label>
                    <select id="driver" name="driver"
                        class="form-select w-full mt-1 @error('driver') border-red-500 @enderror">
                        <option value="no" disabled {{ old('driver') == '' ? 'selected' : '' }}>choose here
                        </option>
                        <option value="yes" {{ old('driver') == 'driver1' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ old('driver') == 'driver2' ? 'selected' : '' }}>No</option>
                    </select>
                    @error('driver')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Proof Image Upload -->
                <div>
                    <label for="proof" class="block text-gray-700">Upload Proof Image</label>
                    <input type="file" id="proof" name="proof" accept="image/*"
                        class="form-input w-full mt-1 @error('proof') border-red-500 @enderror">
                    @error('proof')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trip Description -->
                <div>
                    <label for="trip-description" class="block text-gray-700">Trip Description</label>
                    <textarea id="trip-description" name="trip-description" rows="4"
                        placeholder="Describe the trip"
                        class="form-input w-full mt-1 focus:bg--100 @error('trip-description') border-red-500 @enderror">{{ old('trip-description') }}</textarea>
                    @error('trip-description')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-customer-layout>
