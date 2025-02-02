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

        $names = !is_array($args[CountryEnum::NAME]) ? json_decode($args[CountryEnum::NAME], true) : $args[CountryEnum::NAME];

        $temp = [
            CountryEnum::NAME => LanguageUtil::transformTranslatedData($names),
            CountryEnum::SLUG => $args[CountryEnum::SLUG],
        ];

        if (isset($args[CountryEnum::ID]) && $args[CountryEnum::ID]) {
            $temp[CountryEnum::ID] = $args[CountryEnum::ID];
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

        if (isset($args[CountryEnum::NAME]) && $args[CountryEnum::NAME]) {
            $names = !is_array($args[CountryEnum::NAME]) ? json_decode($args[CountryEnum::NAME], true) : $args[CountryEnum::NAME];
            $temp[CountryEnum::NAME] = $names;
        }

        if (isset($args[CountryEnum::SLUG]) && $args[CountryEnum::SLUG]) {
            $temp[CountryEnum::SLUG] = $args[CountryEnum::SLUG];
        }

        return $temp;
    }
}
