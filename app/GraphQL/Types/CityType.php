<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;

use GraphQL\Type\Definition\Type;

use App\Enums\CityEnum;

class CityType extends GraphQLType
{
    protected $attributes = [
        'name' => CityEnum::GRAPHQL_TYPE_NAME,
        'description' => CityEnum::GRAPHQL_TYPE_DESCRIPTION,
    ];

    public function fields(): array
    {
        return [
            CityEnum::ID => [
                'type' => Type::int(),
                'description' => 'The Id of the City',
            ],
            CityEnum::DEPARTMENT_ID => [
                'type' => Type::int(),
                'description' => 'The Id of the Department into the City',
            ],
            CityEnum::NAME => [
                'type' => Type::string(),
                'description' => 'The Name of the City',
            ],
            CityEnum::SLUG => [
                'type' => Type::string(),
                'description' => 'The Slug of the City',
            ],
            CityEnum::CREATED_AT => [
                'type' => Type::string(),
                'description' => 'The Create Date of the City',
            ],
            CityEnum::UPDATED_AT => [
                'type' => Type::string(),
                'description' => 'The Update Date of the City',
            ],
        ];
    }
}
