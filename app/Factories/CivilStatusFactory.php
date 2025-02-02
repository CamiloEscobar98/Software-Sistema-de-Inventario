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
            $slugs
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;
        $slugs = !is_array($slugs) ? json_decode($slugs, true) : $slugs;

        return [
            CivilStatusEnum::NAME => LanguageUtil::transformTranslatedData($names),
            CivilStatusEnum::SLUG => LanguageUtil::transformTranslatedData($slugs)
        ];
    }
}
