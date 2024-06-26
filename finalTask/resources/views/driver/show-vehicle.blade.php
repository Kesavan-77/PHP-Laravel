<x-driver-layout>
    <div class="min-h-screen flex flex-col justify-center py-10 px-6">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden mx-auto max-w-5xl p-6 border border-gray-300">
            <!-- Vehicle Details Section -->
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Vehicle Image Section -->
                <div class="flex-shrink-0 md:w-1/2">
                    <img src="{{ asset('/storage/vehicle/' . $vehicle->vehicle_img) }}" alt="Vehicle Image"
                        class="w-full h-full object-cover rounded-md shadow-md transition-transform transform hover:scale-105">
                </div>
                
                <!-- Vehicle Information Section -->
                <div class="p-4 flex-grow">
                    <!-- Vehicle Number -->
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $vehicle->vehicle_no }}</h2>
                    
                    <!-- Vehicle Type -->
                    <p class="text-lg text-gray-700 mb-4">{{ $vehicle->vehicle_type }}</p>
                    
                    <!-- Vehicle Status and Person Count -->
                    <div class="flex items-center mb-4">
                        <span class="mr-3">
                            @if ($vehicle->vehicle_status === 'Active')
                                <span class="px-3 py-1 bg-green-200 text-green-800 rounded-full font-semibold">
                                    {{ $vehicle->vehicle_status }}
                                </span>
                            @else
                                <span class="px-3 py-1 bg-red-200 text-red-800 rounded-full font-semibold">
                                    {{ $vehicle->vehicle_status }}
                                </span>
                            @endif
                        </span>
                        <span class="text-sm text-gray-600">Person Count: {{ $vehicle->person_count }}</span>
                    </div>

                    <!-- Vehicle Charge Section -->
                    <div class="bg-blue-50 p-4 rounded-lg mb-4">
                        <p class="text-lg font-medium text-gray-800">Vehicle Charge:</p>
                        <p class="text-xl font-bold text-blue-600">${{ number_format($vehicle->vehicle_charge, 2) }}/ per km</p>
                    </div>

                    <!-- Owner Details Section -->
                    <div class="mt-6">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-3">Owner Details</h3>
                        <div class="space-y-4">
                            <!-- Owner Name -->
                            <p class="text-lg text-gray-700"><span class="font-semibold">Owner Name:</span>
                                {{ $vehicle->user->name }}
                            </p>
                            <!-- Owner Email -->
                            <p class="text-lg text-gray-700"><span class="font-semibold">Owner Email:</span>
                                {{ $vehicle->user->email }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-driver-layout>
