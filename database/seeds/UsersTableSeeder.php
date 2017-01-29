<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password123'),
            'is_admin' => true,
        ]);

        factory(App\Models\User::class)->create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
