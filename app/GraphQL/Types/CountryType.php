<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

use GraphQL\Type\Definition\Type;

use App\Enums\CountryEnum;
use App\Enums\DepartmentEnum;
use App\Enums\CityEnum;

use App\Models\Country;

class CountryType extends GraphQLType
{
    protected $attributes = [
        'name' => CountryEnum::GRAPHQL_TYPE_NAME,
        'description' => CountryEnum::GRAPHQL_TYPE_DESCRIPTION,
        'model' => Country::class
    ];

    public function fields(): array
    {
        return [
            CountryEnum::ID => [
                'type' => Type::int(),
                'description' => 'The ID of the Country',
            ],
            CountryEnum::NAME => [
                'type' => Type::string(),
                'description' => 'The name of the Country',
            ],
            CountryEnum::SLUG => [
                'type' => Type::string(),
                'description' => 'The slug of the Country',
            ],
            CountryEnum::CreatedAt => [
                'type' => Type::string(),
                'description' => 'The Create Date of the Country',
            ],
            CountryEnum::UpdatedAt => [
                'type' => Type::string(),
                'description' => 'The Update Date of the Country',
            ],
            CountryEnum::Departments => [
                'type' => Type::listOf(GraphQL::type(DepartmentEnum::GRAPHQL_TYPE_NAME)),
            ],
        ];
    }
}
