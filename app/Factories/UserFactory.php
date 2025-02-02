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
            UserEnum::USERNAME => $username,
            UserEnum::EMAIL => $email,
            UserEnum::PASSWORD => Hash::make($password),
            UserEnum::REMEMBER_TOKEN => $rememberToken,
            UserEnum::EMAIL_VERIFIED_AT => $emailVerifiedAt,
        ];
    }
}
