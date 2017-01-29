<?php

namespace App\Models;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_isAdmin()
    {
        $user = factory(User::class)->make();
        $this->assertFalse($user->isAdmin());

        $user->is_admin = true;
        $this->assertTrue($user->isAdmin());
    }
}
