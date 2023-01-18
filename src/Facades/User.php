<?php

declare(strict_types=1);

namespace MG\User\Facades;

use Illuminate\Support\Facades\Facade;

class User extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'user';
    }
}