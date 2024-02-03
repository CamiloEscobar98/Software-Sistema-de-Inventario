<?php

namespace App\Factories;

use App\Enums\CivilStatusEnum;

use App\Utils\LanguageUtil;

class CivilStatusFactory
{
    public static function create(...$args): array
    {
        [
            $names,
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;

        return [
            CivilStatusEnum::Name => LanguageUtil::transformTranslatedData($names),
        ];
    }
}
