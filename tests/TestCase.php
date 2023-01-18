<?php

namespace MG\User\Tests;

use Illuminate\Database\Schema\Blueprint;
use MG\User\User;
use MG\User\UserServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected array $data = [
        'name' => 'New MG',
        'email' => 'new-mg@dashboard.com',
        'password' => 'mgamal92',
        'password_confirmation' => 'mgamal92',
    ];

    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    protected function getPackageProviders($app)
    {
        return [
            UserServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function setUpDatabase($app)
    {
        $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    protected function createUser(): User
    {
        return User::factory()->create();
    }
}
