<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Models\User;
use Tests\Helper;

class RedirectIfNotAdminTest extends \Tests\TestCase
{
    public function test_handle_request_by_admin()
    {
        $closure = function($r) { return 'isAdmin'; };
        $this->be(Helper::getAdminUser());
        $response = (new RedirectIfNotAdmin)->handle(new Request, $closure);

        $this->assertEquals('isAdmin', $response);
    }

    public function test_handle_redirect_if_not_admin()
    {
        $this->be(Helper::getNormalUser());
        $response = (new RedirectIfNotAdmin)->handle(new Request, function(){});

        $this->assertEquals(redirect('/'), $response);
    }
}
