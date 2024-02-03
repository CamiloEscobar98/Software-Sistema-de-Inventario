<?php

namespace App\Factories;

use App\Enums\CountryEnum;

use App\Utils\LanguageUtil;

class CountryFactory
{
    public static function create(...$args): array
    {
        [
            $id,
            $names,
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;

        return [
            CountryEnum::Id => $id,
            CountryEnum::Name => LanguageUtil::transformTranslatedData($names),
            CountryEnum::Slug => LanguageUtil::transformTranslatedData($names)
        ];
    }
}
