<?php

declare(strict_types=1);

namespace App\GraphQL\Types\Responses;

use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

use GraphQL\Type\Definition\Type;

use App\Enums\ResponseEnum;
use App\Enums\GraphQLTypeEnum;
use App\Enums\CountryEnum;

class CountryListResponse extends GraphQLType
{
    protected $attributes = [
        GraphQLTypeEnum::Name => CountryEnum::TypePaginatedName,
        GraphQLTypeEnum::Description => CountryEnum::TypePaginatedDescription,
    ];

    public function fields(): array
    {
        return array_merge(ResponseEnum::paginationResponse(), [
            ResponseEnum::Data => [
                GraphQLTypeEnum::Type => Type::listOf(GraphQL::type(CountryEnum::TypeName)),
                GraphQLTypeEnum::Description => 'The data of the response, the list of Countries',
            ],
        ]);
    }
}
