<?php

namespace Tests\Feature\User;


class UsersControllerDeleteTest extends UsersControllerBaseTest
{
    public function test_deleting_user()
    {
        $user = $this->createUser();
        $res = $this->deleteJson(self::REQ_URI.'/'.$user->id);
        $res->assertOk();

        $this->assertModelMissing($user);
        $this->assertDatabaseMissing('user', [
            'name' => $user->name,
        ]);
    }
}
