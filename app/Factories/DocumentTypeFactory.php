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
            $slug
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;

        return [
            DocumentTypeEnum::Name => LanguageUtil::transformTranslatedData($names),
            DocumentTypeEnum::Slug => $slug,
        ];
    }
}
