<?php

namespace App\Factories;

use App\Enums\LanguageEnum;

use App\Utils\LanguageUtil;

class LanguageFactory
{
    public static function create(...$args): array
    {
        [
            $names,
            $slug
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;

        return [
            LanguageEnum::Name => LanguageUtil::transformTranslatedData($names),
            LanguageEnum::Slug => $slug,
        ];
    }
}
