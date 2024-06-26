<x-owner-layout>
    <div class="py-12 min-h-screen">
        <div class="mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-white p-6 rounded-md mb-6 border-2 border-black-500">
                <h2 class="text-3xl font-extrabold text-gray-800">Notifications</h2>
            </div>

            <!-- Success message alert -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <!-- Notifications List -->
            <div class="flex gap-5 max-w-4xl">
                @forelse($notifications as $notification)
                    <!-- Notification Card -->
                    <div class="bg-white p-6 border border-gray-200 rounded-md border-2 border-black-500">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-4">
                                <!-- Notification Icon -->
                                <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center text-white">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <!-- Notification Title -->
                                    <p class="font-bold text-xl text-blue-800 mb-2 flex gap-3">
                                        {{ $notification->data['name'] }}
                                        @if (!$notification->read_at)
                                            <!-- New notification indicator -->
                                            <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full mt-2 inline-block animate-pulse">
                                                New
                                            </span>
                                        @endif
                                    </p>

                                    <!-- Notification Message -->
                                    <p class="text-md text-gray-700 mb-4">
                                        @php
                                            $message = $notification->data['message'];
                                            $data = json_decode($message, true);
                                            $to_locations = $data['to_locations']
                                                ? json_decode($data['to_locations'])
                                                : [];
                                            $image_name = $data['proof_image']; // Assuming you store the image file name in your data
                                            $image_url = asset('storage/' . $image_name); // Generate URL for the image
                                        @endphp
                                        <!-- Additional processing can be done here if needed -->
                                    </p>

                                    <!-- Trip Details -->
                                    <div class="border-t border-gray-300 pt-4">
                                        <p class="text-sm text-gray-500 font-semibold">Trip Details:</p>
                                        <ul class="list-disc pl-5 space-y-1">
                                            <li><strong>From Location:</strong> {{ $data['from_location'] }}</li>
                                            <li>
                                                <strong>To Locations:</strong>
                                                <span class="text-blue-700">
                                                    @if ($to_locations)
                                                        @foreach ($to_locations as $index => $location)
                                                            {{ $location }}
                                                            @if ($index < count($to_locations) - 1)
                                                                <i class="fas fa-arrow-right mx-2 text-gray-500"></i>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                            </li>
                                            <li><strong>From Date:</strong> {{ $data['from_date'] }}</li>
                                            <li><strong>To Date:</strong> {{ $data['to_date'] }}</li>
                                            <li><strong>Vehicle No:</strong> {{ $data['vehicle_no'] }}</li>
                                            <li><strong>Download proof:</strong>
                                                <a href="{{ $image_url }}" download class="text-blue-500 underline">
                                                    Download
                                                </a>
                                            </li>
                                            <li><strong>Driver needed:</strong> {{ $data['driver'] }}</li>
                                            <li><strong>Trip Description:</strong> {{ $data['trip_description'] }}</li>
                                        </ul>
                                        <br>

                                        <!-- Action Buttons (Approve/Reject) -->
                                        <div class="flex gap-3">
                                            <form method="POST" action="{{ route('owner.actionEvent') }}">
                                                @csrf
                                                <input type="hidden" name="trip_details" value="{{ json_encode($notification->data['message']) }}" />
                                                <input type="hidden" name="user_id" value="{{ $notification->data['user_id'] }}" />
                                                <input type="hidden" name="notify_id" value="{{ $notification->id }}" />

                                                <button type="submit"
                                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                    name="action" value="approved">Approve</button>
                                            </form>
                                            <form method="POST" action="{{ route('owner.actionEvent') }}">
                                                @csrf
                                                <input type="hidden" name="trip_details" value="{{ json_encode($notification->data['message']) }}" />
                                                <input type="hidden" name="user_id" value="{{ $notification->data['user_id'] }}" />
                                                <input type="hidden" name="notify_id" value="{{ $notification->id }}" />

                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                                    name="action" value="rejected">Reject</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Notification timestamp -->
                            <div class="text-right">
                                <p class="text-xs text-gray-400">
                                    {{ $notification->updated_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- No notifications message -->
                    <div class="bg-white p-10 text-center rounded-md border-2 border-black-500">
                        <p class="text-xl text-gray-600">
                            No notifications found
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
        <!-- Mark all notifications as read -->
        {{ auth()->user()->notifications->where('notifiable_id', Auth::id())->markAsRead() }}
    </div>
</x-owner-layout>
