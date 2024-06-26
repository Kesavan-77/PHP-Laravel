<x-customer-layout>
    <div class="py-12 min-h-screen">
        <div class="mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-white p-6 rounded-md mb-6 border-2 border-gray-500">
                <h2 class="text-3xl font-extrabold text-gray-800">Notifications</h2>
            </div>
                    @forelse($notifications as $notification)
                        <div class="max-w-6xl my-6 p-6 bg-white rounded-lg border-2 border-gray-500">
                            <div class="flex items-center justify-between">
                                <a href="/" class="text-black-800 hover:underline">
                                    <div class="flex items-center space-x-2">
                                        <p class="font-semibold text-md">{{ Auth::user()->name }}</p>
                                        <p class="text-md">{{ $notification->data['message'] }}</p>
                                        @unless($notification->read_at)
                                            <p class="ml-3 text-green-500 text-sm">new notification</p>
                                        @endunless
                                    </div>
                                </a>
                                <div>
                                    <p class="text-sm text-gray-500">{{ $notification->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="mt-2 text-gray-500">No notifications found</p>
                    @endforelse
                    {{-- Mark notifications as read --}}
                    {{ auth()->user()->notifications->where('notifiable_id', Auth::id())->markAsRead() }}
        </div>
    </div>
</x-customer-layout>
