<?php

declare(strict_types=1);

namespace MG\User;

use Illuminate\Support\ServiceProvider;
use MG\User\Facades\User;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //@TODO: make routes configurable
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->publishes([
            // config file.
            __DIR__.'/config/laravel-user.php' => config_path('laravel-user.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/laravel-user.php', 'laravel-user');

        $this->app->singleton('laravel-user', function () {
            return new User();
        });
    }
}
