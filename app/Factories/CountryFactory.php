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
            $slug
        ] = $args;

        $names = !is_array($names) ? json_decode($names, true) : $names;

        $temp = [
            CountryEnum::Name => LanguageUtil::transformTranslatedData($names),
            CountryEnum::Slug => $slug,
        ];

        if (isset($id) && $id) {
            $temp[CountryEnum::Id] = $id;
        }
        
        return $temp;
    }

    public static function update(...$args): array
    {
        [
            $id,
            $name,
            $slug
        ] = $args;

        $temp = [];

        $temp[CountryEnum::Id] = $id;

        if (isset($name) && $name) {
            $temp[CountryEnum::Name] = $name;
        }

        if (isset($slug) && $slug) {
            $temp[CountryEnum::Slug] = $slug;
        }

        return $temp;
    }
}
