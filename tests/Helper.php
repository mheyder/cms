<?php

namespace Tests;

use App\Models\User;

class Helper
{
    public static function getAdminUser()
    {
        return self::getDefaultUser('admin@admin.com');
    }

    public static function getNormalUser()
    {
        return self::getDefaultUser('user@user.com');
    }

    private static function getDefaultUser($email)
    {
        $user = User::where('email', $email)->first();
        $user->password = 'password123';
        return $user;
    }
}

