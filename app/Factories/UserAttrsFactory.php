<?php

namespace App\Factories;

use App\Enums\UserAttrsEnum;

class UserAttrsFactory
{
    /**
     * Build default attrs
     * @return array
     */
    public static function buildAttrs(): array
    {
        return [
            UserAttrsEnum::LANG => UserAttrsEnum::LANG_ES
        ];
    }
}
