<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Enums\CityEnum;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CityType extends GraphQLType
{
    protected $attributes = [
        'name' => CityEnum::TypeName,
        'description' => CityEnum::TypeDescription,
    ];

    public function fields(): array
    {
        return [
            CityEnum::Id => [
                'type' => Type::int(),
                'description' => 'The Id of the City',
            ],
            CityEnum::DepartmentId => [
                'type' => Type::int(),
                'description' => 'The Id of the Department into the City',
            ],
            CityEnum::Name => [
                'type' => Type::string(),
                'description' => 'The Name of the City',
            ],
            CityEnum::Slug => [
                'type' => Type::string(),
                'description' => 'The Slug of the City',
            ],
            CityEnum::CreatedAt => [
                'type' => Type::string(),
                'description' => 'The Create Date of the City',
            ],
            CityEnum::UpdatedAt => [
                'type' => Type::string(),
                'description' => 'The Update Date of the City',
            ],
        ];
    }
}
