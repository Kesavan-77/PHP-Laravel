<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // This method is used to register services into the service container (not used in this example).
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // This method is used to bootstrap the application services.

        // Registering Blade components for different layouts:
        Blade::component('layouts.customer', 'customer-layout'); // Blade component for customer layout
        Blade::component('layouts.driver', 'driver-layout'); // Blade component for driver layout
        Blade::component('layouts.owner', 'owner-layout'); // Blade component for owner layout
    }
}
