<?php

namespace MG\User\Tests\Feature\User;

use Illuminate\Support\Arr;

class UsersControllerUpdateTest extends UsersControllerBaseTest
{
    public function test_updating_user_with_wrong_request()
    {
        $user = $this->createUser();
        $res = $this->putJson(self::REQ_URI . '/' . $user->id, Arr::except($this->data, ['name']));
        $res->assertJsonValidationErrorFor('name');
        $res->assertJsonStructure([
            'message',
            'errors' => ['name'],
        ]);
        $this->assertDatabaseMissing('users', [
            'name' => $this->data['name'],
        ]);
    }

    public function test_updating_user()
    {
        $user = $this->createUser();
        $res = $this->putJson(self::REQ_URI . '/' . $user->id, $this->data);
        $res->assertOk();
        $this->assertDatabaseHas('users', [
            'name' => $this->data['name'],
        ]);
    }
}
