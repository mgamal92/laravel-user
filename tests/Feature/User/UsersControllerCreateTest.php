<?php

namespace MG\User\Tests\Feature\User;

use Illuminate\Support\Arr;

class UsersControllerCreateTest extends UsersControllerBaseTest
{
    public function test_creating_user_with_wrong_request()
    {
        $res = $this->postJson(self::REQ_URI, Arr::except($this->data, ['type']));
        $res->assertJsonValidationErrorFor('type');

        $this->assertDatabaseMissing('users', [
            'name' => $this->data['name'],
        ]);
    }

    public function test_creating_user()
    {
        $res = $this->actingAs($this->createUser())->postJson(self::REQ_URI, $this->data);
        $res->assertCreated();
        $res->assertJsonStructure(
            [
                'data' => [
                    'id',
                    'name',
                    'username',
                    'email',
                    'type',
                    'profile_picture',
                ]
            ]
        );

        $this->assertDatabaseHas('users', [
            'name' => $this->data['name'],
        ]);
    }
}
