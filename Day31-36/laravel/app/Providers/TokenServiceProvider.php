<?php
// app/Providers/TokenServiceProvider.php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MyToken;

class TokenServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('mytoken', function($app) {
            return new MyToken;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        // ...
    }
}
