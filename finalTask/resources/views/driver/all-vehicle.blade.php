<x-driver-layout>
    <!-- Driver Layout Wrapper -->
    <div class="min-h-screen flex flex-col py-6 px-6">
        <!-- Success Alert -->
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>

        <!-- Vehicle Cards Container -->
        <div class="flex gap-4 flex-wrap">
            @forelse ($vehicles as $vehicle)
                <!-- Individual Vehicle Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden w-80 p-5 border-2 border-black-500">
                    <!-- Vehicle Image -->
                    <img src="{{ asset('/storage/vehicle/' . $vehicle->vehicle_img) }}" alt="Vehicle Image"
                        class="w-full h-48 object-cover">

                    <!-- Vehicle Details -->
                    <div class="p-4">
                        <!-- Vehicle Number -->
                        <h2 class="text-xl font-semibold text-gray-800">{{ $vehicle->vehicle_no }}</h2>
                        <!-- Vehicle Type -->
                        <p class="text-sm text-gray-600 mb-2">{{ $vehicle->vehicle_type }}</p>

                        <!-- Status and Person Count -->
                        <div class="flex items-center mb-2">
                            <span class="text-sm text-gray-600 mr-2">
                                @if ($vehicle->vehicle_status === 'Active')
                                    <span class="px-2 py-1 bg-green-200 text-green-800 rounded-full">
                                        {{ $vehicle->vehicle_status }}
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-red-200 text-red-800 rounded-full">
                                        {{ $vehicle->vehicle_status }}
                                    </span>
                                @endif
                            </span>
                            <span class="text-sm text-gray-600">Person Count: {{ $vehicle->person_count }}</span>
                        </div>

                        <!-- Vehicle Charge -->
                        <p class="text-sm text-gray-600">Vehicle Charge:
                            ${{ number_format($vehicle->vehicle_charge, 2) }}
                        </p>
                    </div>

                    <!-- View Details Button -->
                    <div class="bg-gray-100 px-4 py-2 mt-auto">
                        <a href="{{ route('driver.showVehicle', $vehicle) }}"
                            class="text-indigo-600 hover:text-indigo-800">View Details</a>
                    </div>
                </div>
            @empty
                <!-- No Vehicles Message -->
                <p class="text-xl mt-5">No vehicles available</p>
            @endforelse
        </div>
    </div>
</x-driver-layout>
