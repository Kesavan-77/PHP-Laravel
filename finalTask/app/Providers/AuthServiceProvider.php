<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define authorization Gates based on user roles
        Gate::define('owner-auth', function ($user) {
            return $user->role === 'owner';
        });

        Gate::define('driver-auth', function ($user) {
            return $user->role === 'driver';
        });

        Gate::define('customer-auth', function ($user) {
            return $user->role === 'customer';
        });
    }
}
