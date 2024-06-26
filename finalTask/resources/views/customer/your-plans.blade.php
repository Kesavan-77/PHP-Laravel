<x-customer-layout>
    <div class="min-h-screen flex flex-col py-6 px-6">
        <div class="flex gap-4 flex-wrap">
            @forelse ($plans as $plan)
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden border-2 border-black-500">
                    <!-- Trip Details -->
                    <div class="p-4">
                        <!-- Vehicle No and Driver -->
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <h4 class="text-lg font-bold text-green-600">{{ $plan->vehicle_no }}</h4>
                                <p class="text-gray-500 text-sm">{{ $plan->driver ?? 'No Driver' }}</p>
                            </div>
                            <img src="{{ asset('storage/' . $plan->proof_image) }}" alt="Proof" class="w-12 h-12 object-cover rounded-full border-2 border-blue-500">
                        </div>
                        
                        <!-- Locations -->
                        <p class="text-sm text-gray-600 mb-1"><strong>From:</strong> {{ $plan->from_location }}</p>
                        <p class="text-sm text-gray-600 truncate mb-1"><strong>To:</strong> 
                            @foreach (json_decode($plan->to_locations) as $location)
                                {{ $location }}@if (!$loop->last), @endif
                            @endforeach
                        </p>
                        
                        <!-- Dates -->
                        <p class="text-sm text-gray-600 mb-1"><strong>Dates:</strong> {{ $plan->from_date }} - {{ $plan->to_date }}</p>
                        
                        <!-- Status -->
                        <p class="text-sm text-gray-600 mb-1"><strong>Status:</strong> 
                            <span class="px-2 py-1 rounded-full text-white {{ $plan->status == 'approved' ? 'bg-green-500' : ($plan->status == 'rejected' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                {{ $plan->status ?? 'Pending' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-xl mt-5 text-gray-700">No plans available</p>
            @endforelse
        </div>
    </div>
</x-customer-layout>
