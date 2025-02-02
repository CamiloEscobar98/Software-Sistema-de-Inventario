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
        GraphQLTypeEnum::NAME => CountryEnum::TypePaginatedName,
        GraphQLTypeEnum::DESCRIPTION => CountryEnum::TypePaginatedDescription,
    ];

    public function fields(): array
    {
        return array_merge(ResponseEnum::paginationStructureResponse(), [
            ResponseEnum::DATA => [
                GraphQLTypeEnum::TYPE => Type::listOf(GraphQL::type(CountryEnum::GRAPHQL_TYPE_NAME)),
                GraphQLTypeEnum::DESCRIPTION => 'The data of the response, the list of Countries',
            ],
        ]);
    }
}
