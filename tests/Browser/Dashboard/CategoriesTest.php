<?php

namespace Tests\Browser\Dashboard;

use App\Models\User;
use Tests\Helper;

class CategoriesTest extends \Tests\DuskTestCase
{
    public function test_categories_page()
    {
        $this->browse(function ($browser) {
            $browser->loginAs(Helper::getAdminUser())
                ->visit('/dashboard')
                ->clickLink('Categories')
                ->assertPathIs('/dashboard/categories')
                ->assertSeeIn('.table thead', 'Name')
                ->assertSeeIn('.table thead', 'Full Path');

            $browser->clickLink('Create')
                ->assertPathIs('/dashboard/categories/create');

        });
    }
}
