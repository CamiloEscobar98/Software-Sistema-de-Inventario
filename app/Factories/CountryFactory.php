<?php

namespace App\Factories;

use App\Enums\CountryEnum;

use App\Utils\LanguageUtil;

class CountryFactory
{
    /**
     * @param array $args
     * 
     * @return array
     */
    public static function create($args): array
    {
        $temp = [];

        $names = !is_array($args[CountryEnum::Name]) ? json_decode($args[CountryEnum::Name], true) : $args[CountryEnum::Name];

        $temp = [
            CountryEnum::Name => LanguageUtil::transformTranslatedData($names),
            CountryEnum::Slug => $args[CountryEnum::Slug],
        ];

        if (isset($args[CountryEnum::Id]) && $args[CountryEnum::Id]) {
            $temp[CountryEnum::Id] = $args[CountryEnum::Id];
        }

        return $temp;
    }

    /**
     * @param array $args
     * 
     * @return array
     */
    public static function update(array $args): array
    {
        $temp = [];

        if (isset($args[CountryEnum::Name]) && $args[CountryEnum::Name]) {
            $names = !is_array($args[CountryEnum::Name]) ? json_decode($args[CountryEnum::Name], true) : $args[CountryEnum::Name];
            $temp[CountryEnum::Name] = $names;
        }

        if (isset($args[CountryEnum::Slug]) && $args[CountryEnum::Slug]) {
            $temp[CountryEnum::Slug] = $args[CountryEnum::Slug];
        }

        return $temp;
    }
}
