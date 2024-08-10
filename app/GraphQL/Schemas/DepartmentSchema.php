<?php

namespace App\GraphQL\Schemas;

use Rebing\GraphQL\Support\Contracts\ConfigConvertible;

use App\GraphQL\Queries\DepartmentListQuery;

use App\GraphQL\Types\CityType;
use App\GraphQL\Types\CountryType;
use App\GraphQL\Types\DepartmentType;

class DepartmentSchema implements ConfigConvertible
{
    public function toConfig(): array
    {
        return [
            'query' => [
                DepartmentListQuery::class,
            ],

            'mutation' => [
                // ExampleMutation::class,
            ],

            'types' => [
                DepartmentType::class,
                CountryType::class,
                CityType::class,
            ],
        ];
    }
}
