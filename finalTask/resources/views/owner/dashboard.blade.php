<x-owner-layout>
    <div class="min-h-screen flex flex-col py-6 px-6">
        <!-- Success message alert -->
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>

        <!-- Add vehicle button -->
        <a href="{{ route('vehicle.create') }}">
            <button type="button"
                class="px-5 py-3 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-bold rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 h-fit w-fit">
                + Add vehicle
            </button>
        </a>

        <!-- Vehicles list -->
        <div class="flex gap-4 flex-wrap">
            @forelse ($vehicles as $vehicle)
                <!-- Vehicle card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden w-80 p-5 border-2 border-black-500">
                    <!-- Vehicle image -->
                    <img src="{{ asset('/storage/vehicle/'.$vehicle->vehicle_img) }}" alt="Vehicle Image"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <!-- Vehicle details -->
                        <h2 class="text-xl font-semibold text-gray-800">{{ $vehicle->vehicle_no }}</h2>
                        <p class="text-sm text-gray-600 mb-2">{{ $vehicle->vehicle_type }}</p>
                        <div class="flex items-center mb-2">
                            <!-- Vehicle status badge -->
                            <span class="text-sm text-gray-600 mr-2">
                                @if ($vehicle->vehicle_status === 'Active')
                                    <span
                                        class="px-2 py-1 bg-green-200 text-green-800 rounded-full">{{ $vehicle->vehicle_status }}</span>
                                @else
                                    <span
                                        class="px-2 py-1 bg-red-200 text-red-800 rounded-full">{{ $vehicle->vehicle_status }}</span>
                                @endif
                            </span>
                            <span class="text-sm text-gray-600">Person Count: {{ $vehicle->person_count }}</span>
                        </div>
                        <p class="text-sm text-gray-600">Vehicle Charge:
                            ${{ number_format($vehicle->vehicle_charge, 2) }}
                        </p>
                    </div>
                    <!-- View details button -->
                    <div class="bg-gray-100 px-4 py-2 mt-auto">
                        <a href="{{ route('vehicle.show', $vehicle) }}"
                            class="text-indigo-600 hover:text-indigo-800">View Details</a>
                    </div>
                </div>
            @empty
                <!-- No vehicles message -->
                <p class="text-xl mt-5">No vehicles available</p>
            @endforelse
        </div>
    </div>
</x-owner-layout>
