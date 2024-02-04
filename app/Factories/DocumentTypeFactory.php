<?php

namespace App\Factories;

use App\Enums\DocumentTypeEnum;

use App\Utils\LanguageUtil;

class DocumentTypeFactory
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
            DocumentTypeEnum::Name => LanguageUtil::transformTranslatedData($names),
            DocumentTypeEnum::Slug => LanguageUtil::transformTranslatedData($slugs),
        ];
    }
}
