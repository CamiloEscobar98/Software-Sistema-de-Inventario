<?php

namespace App\GraphQL\Schemas;

use App\GraphQL\Mutations\CountryCreateMutation;

use App\GraphQL\Queries\CountryListQuery;

use App\GraphQL\Types\CountryType;
use App\GraphQL\Types\DepartmentType;
use App\GraphQL\Types\CityType;

use Rebing\GraphQL\Support\Contracts\ConfigConvertible;

class CountrySchema implements ConfigConvertible
{
    public function toConfig(): array
    {
        return [
            'query' => [
                CountryListQuery::class,
            ],

            'mutation' => [
                CountryCreateMutation::class,
            ],

            'types' => [
                CountryType::class,
                DepartmentType::class,
                CityType::class,
            ],
        ];
    }
}
