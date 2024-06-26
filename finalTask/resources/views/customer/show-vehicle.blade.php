<x-customer-layout>
    <!-- Customer Layout Wrapper -->
    <div class="min-h-screen flex flex-col justify-center py-10 px-6">
        <!-- Vehicle Details Container -->
        <div class="bg-white rounded-lg shadow-xl overflow-hidden mx-auto max-w-5xl p-6 border border-gray-300">
            <!-- Vehicle Details Section -->
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Vehicle Image -->
                <div class="flex-shrink-0 md:w-1/2">
                    <img src="{{ asset('/storage/vehicle/' . $vehicle->vehicle_img) }}" alt="Vehicle Image"
                        class="w-full h-full object-cover rounded-md shadow-md transition-transform transform hover:scale-105">
                </div>

                <!-- Vehicle Information -->
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

                    <!-- Vehicle Charge -->
                    <div class="bg-blue-50 p-4 rounded-lg mb-4">
                        <p class="text-lg font-medium text-gray-800">Vehicle Charge:</p>
                        <p class="text-xl font-bold text-blue-600">${{ number_format($vehicle->vehicle_charge, 2) }}/
                            per km</p>
                    </div>

                    <!-- Owner Details -->
                    <div class="mt-6">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-3">Owner Details</h3>
                        <div class="space-y-4">
                            <p class="text-lg text-gray-700"><span class="font-semibold">Owner Name:</span>
                                {{ $vehicle->user->name }}
                            </p>
                            <p class="text-lg text-gray-700"><span class="font-semibold">Owner Email:</span>
                                {{ $vehicle->user->email }}
                            </p>
                        </div>
                    </div>

                    <!-- Plan a Trip Button (if vehicle is Active) -->
                    @if ($vehicle->vehicle_status == 'Active')
                        <div class="mt-6">
                            <a href='{{ route('trip.index', $vehicle) }}'>
                                <button type="button"
                                    class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    <p class="text-lg">Plan a trip</p>
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-customer-layout>
