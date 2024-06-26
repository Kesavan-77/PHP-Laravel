<x-owner-layout>
    <div class="min-h-screen flex flex-col justify-center py-10 px-6">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden mx-auto max-w-5xl p-6 border border-gray-300">
            <!-- Success message alert -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            
            <!-- Vehicle Details Section -->
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Vehicle Image Section -->
                <div class="flex-shrink-0 md:w-1/2">
                    <img src="{{ asset('/storage/vehicle/' . $vehicle->vehicle_img) }}" alt="Vehicle Image"
                        class="w-full h-full object-cover rounded-md shadow-md transition-transform transform hover:scale-105">
                </div>
                
                <!-- Vehicle Information Section -->
                <div class="p-4 flex-grow">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $vehicle->vehicle_no }}</h2>
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
                    
                    <!-- Vehicle Details Description -->
                    <div class="mt-6">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-3">Vehicle Details</h3>
                        <p class="text-gray-600 leading-relaxed">
                            <!-- Placeholder text; replace with real details if available -->
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons Section -->
            <div class="mt-6 flex justify-between bg-gray-50 p-4 rounded-lg shadow-inner">
                <!-- Edit Vehicle Button -->
                <a href="{{ route('vehicle.edit', $vehicle) }}" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 rounded-lg text-sm px-5 py-2.5 transition-colors">
                    Edit Vehicle
                </a>
                
                <!-- Delete Vehicle Form -->
                <form action="{{ route('vehicle.destroy', $vehicle) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 rounded-lg text-sm px-5 py-2.5 transition-colors"
                        onclick="return confirm('Are you sure you want to delete this vehicle?')">
                        Delete Vehicle
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-owner-layout>
