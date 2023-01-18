<?php

namespace MG\User\Tests\Unit\Services;

use MG\User\Services\UserService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use MG\User\Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_method()
    {
        $service = new UserService();

        $this->assertInstanceOf(Collection::class, $service->list());
    }

    public function test_create_method()
    {
        $service = new UserService();

        $this->assertInstanceOf(Model::class, $service->store($this->data));
    }

    public function test_update_method()
    {
        $service = new UserService();
        $user = $this->createUser();

        $this->assertInstanceOf(Model::class, $service->update($user->id, $this->data));
    }

    public function test_show_method()
    {
        $service = new UserService();
        $user = $this->createUser();

        $this->assertInstanceOf(Model::class, $service->show($user->id));
    }

    public function test_delete_method()
    {
        $service = new UserService();
        $user = $this->createUser();

        $service->destroy($user->id);

        $this->assertModelMissing($user);
    }
}
