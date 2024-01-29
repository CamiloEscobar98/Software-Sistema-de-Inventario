<?php

namespace App\GraphQL\Schemas;

use Rebing\GraphQL\Support\Contracts\ConfigConvertible;

use App\GraphQL\Queries\CountryListQuery;

use App\GraphQL\Types\CountryType;
use App\GraphQL\Types\DepartmentType;
use App\GraphQL\Types\CitType;

class CountrySchema implements ConfigConvertible
{
    public function toConfig(): array
    {
        return [
            'query' => [
                CountryListQuery::class
            ],

            'mutation' => [
                // ExampleMutation::class,
            ],

            'types' => [
                CountryType::class,
                DepartmentType::class,
                CitType::class,
            ],
        ];
    }
}
