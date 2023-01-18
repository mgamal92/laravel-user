<?php

namespace MG\User\Tests\Feature\User;


class UsersControllerListingTest extends UsersControllerBaseTest
{

    public function test_listing_users()
    {
        $res = $this->getJson(self::REQ_URI);
        $res->assertOk();
        $res->assertJsonStructure(
            [
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'username',
                        'email',
                        'profile_picture',
                    ]
                ]
            ]
        );
    }
}
