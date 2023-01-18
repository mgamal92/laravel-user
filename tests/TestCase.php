<?php

namespace MG\User\Tests;

use App\Models\User;
use MG\User\UserServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected $enablesPackageDiscoveries = true;
    
    protected array $data = [
        'name' => 'New MG',
        'email' => 'new-mg@dashboard.com',
        'password' => 'mgamal92',
        'password_confirmation' => 'mgamal92',
    ];

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate', ['--database' => 'testbench'])->run();
    }

    protected function getPackageProviders($app)
    {
        return [
            UserServiceProvider::class,
        ];
    }

    public function ignorePackageDiscoveriesFrom()
    {
        return [];
    }

    protected function createUser(): User
    {
        return User::factory()->create();
    }
}
