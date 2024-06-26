<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- External Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Vite for assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<style>
    /* Custom Styles */
    .active {
        background-color: #14c914;
        color: #fff;
    }

    .active:hover {
        background-color: #10a023;
        color: #fff;
    }
</style>

<body class="font-sans antialiased dark:bg-gray-900" x-data="{ sidebarOpen: false }">

    <!-- Navigation Bar -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <!-- Logo and Sidebar Toggle -->
                <div class="flex items-center justify-start rtl:justify-end">
                    <button @click="sidebarOpen = !sidebarOpen" aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <!-- Logo Link -->
                    <a href="#" class="flex ms-2 md:me-24">
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">PlanON</span>
                    </a>
                </div>
                <!-- User Profile Menu -->
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                        <!-- User Dropdown Menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <!-- User dropdown menu items -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside x-bind:class="{ '-translate-x-full': !sidebarOpen }" id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <!-- Sidebar Navigation Links -->
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('allVehicles') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('allVehicles') ? 'active' : '' }}">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">All Vehicle</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('trip.plans') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('trip.plans') ? 'active' : '' }}">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Your trip plans</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('customer.notifications')}}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('customer.notifications') ? 'active' : '' }}">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Notifications</span>
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('/logout') ? 'active' : '' }}">
                        @csrf
                        <button type="submit">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="p-4 sm:ml-64 mt-5">
        {{ $slot }}
    </div>

    <!-- Scripts -->
    <script>
        $(document).ready(function() {
            // Select navigation links and add click event
            const $navLinks = $('aside ul li a');
            $navLinks.on('click', function() {
                $navLinks.removeClass('active');
                $(this).addClass('active');
            });

            // Function to add a new 'To Location' field
            function addToLocationField() {
                const $container = $('#to-location-container');

                // Create a new field
                const $newField = $('<div>', {
                    class: 'flex items-center space-x-2 mt-2'
                });

                // Input field
                const $inputField = $('<input>', {
                    type: 'text',
                    name: 'to-location[]',
                    placeholder: 'Enter destination',
                    class: 'form-input w-full mt-1'
                });

                // Delete button
                const $deleteButton = $('<button>', {
                    type: 'button',
                    class: 'p-1 bg-red-500 hover:bg-red-700 text-white rounded-full flex items-center justify-center w-8 h-8 delete-button',
                    html: '<i class="fa fa-trash-o" aria-hidden="true"></i>'
                }).on('click', function() {
                    $newField.remove();
                });

                // Append elements to the new field
                $newField.append($inputField);

                // Add delete button only if there are already existing fields
                if ($container.children().length > 0) {
                    $newField.append($deleteButton);
                }

                // Append the new field to the container
                $container.append($newField);
            }

            // Event listener for adding new 'To Location' field
            $('#add-location').on('click', addToLocationField);

            // Initialize with the first field (if not already added by old data)
            if ($('#to-location-container').children().length === 0) {
                addToLocationField();
            }

            // Set min date for From Date and To Date
            const today = new Date();
            const minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 30);
            const minDateString = minDate.toISOString().split('T')[0]; // Format as YYYY-MM-DD
            $('#from-date').attr('min', minDateString);
            $('#to-date').attr('min', minDateString);
        });
    </script>
</body>

</html>
