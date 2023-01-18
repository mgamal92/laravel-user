<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected array $data = [
        'name' => 'New MG',
        'email' => 'new-mg@dashboard.com',
        'password' => 'mgamal92',
        'password_confirmation' => 'mgamal92',
    ];

    protected function createUser(): User
    {
        return User::factory()->create();
    }
}
