<?php

namespace App\Factories;

use App\Enums\GenderEnum;

use App\Utils\LanguageUtil;

class GenderFactory
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
            GenderEnum::NAME => LanguageUtil::transformTranslatedData($names),
            GenderEnum::SLUG => LanguageUtil::transformTranslatedData($slugs),
        ];
    }
}
