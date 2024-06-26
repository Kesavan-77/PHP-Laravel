<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- External Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Alpine.js for interactive components -->
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <!-- Vite for CSS and JS bundling -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<style>
    /* Custom Styles */
    .active {
        background-color: #144ac9; /* Active background color */
        color: #fff; /* Text color for active state */
    }

    .active:hover {
        background-color: #103ba0; /* Hover background color for active state */
        color: #fff; /* Text color on hover for active state */
    }
</style>

<body class="font-sans antialiased dark:bg-gray-900" x-data="{ sidebarOpen: false }">

    <!-- Navigation Bar -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <!-- Logo and Sidebar Toggle Button -->
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
                    <a href="/" class="flex ms-2 md:me-24">
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">PlanON</span>
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
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User photo">
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
                    <a href="{{ route('vehicle.index') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('vehicle.index') ? 'active' : '' }}">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">All Vehicle</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('allDrivers')}}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('allDrivers') ? 'active' : '' }}">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">All drivers</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('owner.notifications')}}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('owner.notifications') ? 'active' : '' }}">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Notifications</span>
                    </a>
                </li>
                <li>
                    <!-- Logout Form -->
                    <form action="{{ route('logout') }}" method="post"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('/') ? 'active' : '' }}">
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

</body>

<script>
    // JavaScript to handle navigation link active state
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('aside ul li a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Remove active class from all links
                navLinks.forEach(item => item.classList.remove('active'));
                // Add active class to the clicked link
                this.classList.add('active');
            });
        });
    });
</script>

</html>
