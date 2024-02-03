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
            $slug
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;

        return [
            GenderEnum::Name => LanguageUtil::transformTranslatedData($names),
            GenderEnum::Slug => $slug,
        ];
    }
}
