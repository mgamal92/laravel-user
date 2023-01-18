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
        $this->loadRoutesFrom('routes/api.php');
    }

    public function register()
    {
        $this->app->singleton('laravel-user', function () {
            return new User();
        });
    }
}
