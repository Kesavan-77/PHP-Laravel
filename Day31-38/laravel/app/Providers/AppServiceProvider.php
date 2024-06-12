<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Expr\Cast\String_;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);

        Blade::directive('kesavan',function(){
            return "<p>Hello cheif! you are in</p>";
        });

        Collection::macro('toZero',function(){
            return $this->map(function (string $value) {
                return $value*0;
            });
        });
    }
}
