<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

abstract class UsersControllerBaseTest extends TestCase
{
    use RefreshDatabase;

    const REQ_URI = '/api/users';
}
