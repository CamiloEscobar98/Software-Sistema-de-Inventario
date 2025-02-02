<?php

namespace App\Factories;

use App\Enums\UserAttrsEnum;
use Illuminate\Support\Facades\Hash;

use App\Enums\UserEnum;

class UserFactory
{
    /**
     * Build the create data structure
     * @return array
     */
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
            UserEnum::ATTRS => json_encode(UserAttrsFactory::buildAttrs()),
            UserEnum::PASSWORD => Hash::make($password),
            UserEnum::REMEMBER_TOKEN => $rememberToken,
            UserEnum::EMAIL_VERIFIED_AT => $emailVerifiedAt,
        ];
    }
}
