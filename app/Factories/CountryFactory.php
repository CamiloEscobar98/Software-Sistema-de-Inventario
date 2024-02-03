<?php

namespace App\Factories;

use App\Enums\CountryEnum;
use App\Utils\LanguageUtil;

class CountryFactory
{
    public static function create(...$args): array
    {
        [
            $names,
            $slug,
        ] = $args;

        $names = json_decode($names, true);

        return [
            CountryEnum::Name => LanguageUtil::transformTranslatedData($names),
            CountryEnum::Slug => $slug,
        ];
    }
}
