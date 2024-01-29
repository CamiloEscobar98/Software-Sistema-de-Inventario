<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Enums\CityEnum;
use Rebing\GraphQL\Support\Type as GraphQLType;

use GraphQL\Type\Definition\Type;

use App\Enums\DepartmentEnum;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DepartmentType extends GraphQLType
{
    protected $attributes = [
        'name' => DepartmentEnum::TypeName,
        'description' => DepartmentEnum::TypeDescription,
    ];

    public function fields(): array
    {
        return [
            DepartmentEnum::Id => [
                'type' => Type::int(),
                'description' => 'The Id of the Department',
            ],
            DepartmentEnum::CountryId => [
                'type' => Type::int(),
                'description' => 'The Id of the Country into the Department',
            ],
            DepartmentEnum::Name => [
                'type' => Type::string(),
                'description' => 'The Name of the Department',
            ],
            DepartmentEnum::Slug => [
                'type' => Type::string(),
                'description' => 'The Slug of the Department',
            ],
            DepartmentEnum::CreatedAt => [
                'type' => Type::string(),
                'description' => 'The Create Date of the Department',
            ],
            DepartmentEnum::UpdatedAt => [
                'type' => Type::string(),
                'description' => 'The Update Date of the Department',
            ],
            DepartmentEnum::Cities => [
                'type' => Type::listOf(GraphQL::type(CityEnum::TypeName)),
            ]
        ];
    }
}
