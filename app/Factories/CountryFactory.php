<?php

namespace App\Factories;

use App\Enums\CountryEnum;

class CountryFactory
{
    public static function create(...$args): array
    {
        [
            $name,
            $slug,
        ] = $args;

        $name = json_decode($name, true);

        return [
            CountryEnum::Name => $name,
            CountryEnum::Slug => $slug,
        ];
    }
}
