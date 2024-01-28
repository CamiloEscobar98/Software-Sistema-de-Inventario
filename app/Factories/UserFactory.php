<?php

namespace App\Factories;

use Illuminate\Support\Facades\Hash;

use App\Enums\UserEnum;

class UserFactory
{
    public static function create(...$args): array
    {
        [
            $username,
            $email,
            $password,
            $rememberToken,
            $emailVerifiedAt
        ] = $args;

        return [
            UserEnum::Username => $username,
            UserEnum::Email => $email,
            UserEnum::Password => Hash::make($password),
            UserEnum::RememberToken => $rememberToken,
            UserEnum::EmailVerifiedAt => $emailVerifiedAt,
        ];
    }
}
