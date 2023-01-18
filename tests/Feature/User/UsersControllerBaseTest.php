<?php

namespace MG\User\Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MG\User\Tests\TestCase;

abstract class UsersControllerBaseTest extends TestCase
{
    use RefreshDatabase;

    const REQ_URI = '/api/users';
}
