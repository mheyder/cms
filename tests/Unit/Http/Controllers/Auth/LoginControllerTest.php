<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Tests\Helper;

class LoginControllerTest extends \Tests\TestCase
{
    public function test_login_as_not_admin_redirect_to_index_page()
    {
        $user = Helper::getNormalUser();
        $response = $this->post('/login', ['email' => $user->email, 'password' => $user->password]);
        $response->assertRedirect('/');
    }

    public function test_login_as_admin_redirect_to_dashboard()
    {
        $user = Helper::getAdminUser();
        $response = $this->post('/login', ['email' => $user->email, 'password' => $user->password]);
        $response->assertRedirect('dashboard');
    }
}
