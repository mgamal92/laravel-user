<?php

namespace MG\User\Tests\Feature\User;

class UsersControllerShowTest extends UsersControllerBaseTest
{

    public function test_showing_user()
    {
        $user = $this->createUser();
        $res = $this->getJson(self::REQ_URI . '/' . $user->id);
        $res->assertOk();
        $res->assertJsonStructure(
            [
                'data' => [
                    'id',
                    'name',
                    'username',
                    'email',
                    'profile_picture',
                ]
            ]
        );
    }
}
