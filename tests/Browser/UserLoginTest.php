<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use App\Models\User;
use Tests\Helper;

class UserLoginTest extends \Tests\DuskTestCase
{
    public function test_login_as_admin_redirect_to_dashboard()
    {
        $user = Helper::getAdminUser();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', $user->password)
                ->press('Login')
                ->assertPathIs('/dashboard');
        });
    }

    public function test_access_dashboard_as_not_admin_redirected_to_home()
    {
        $user = Helper::getNormalUser();

        $this->browse(function($browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/dashboard')
                ->assertPathIs('/');
        });
    }
}
