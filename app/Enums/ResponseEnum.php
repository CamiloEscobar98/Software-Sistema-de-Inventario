<?php

namespace App\Enums;

use GraphQL\Type\Definition\Type;

use App\Enums\GraphQLTypeEnum;

class ResponseEnum
{
    const Message = 'message';
    const HttpCode = 'http_code';
    const HttpStatus = 'http_status';
    const Data = 'data';

    const Message_Text = 'The message for the response';
    const HttpCode_Text = 'The Http Code for the response';
    const HttpStatus_Text = 'The Http Status for the response';

    /**
     * Pagination
     * 
     * The consts for the pagination of the response GraphQL Type Structure.
     */
    const IsPaginated = 'is_paginated';
    const CurrentPage = 'current_page';
    const LastPage = 'last_page';
    const PerPage = 'per_page';
    const FromPage = 'from';
    const ToPage = 'to';
    const TotalItems = 'total';
    const CountItems = 'count';

    const IsPaginated_Text = 'If the response has data paginated';
    const CurrentPage_Text = 'The current page in the pagination';
    const LastPage_Text = 'The last page in the pagination';
    const PerPage_Text = 'The number of the items per page';
    const FromPage_Text = 'The page before in the pagination';
    const ToPage_Text = 'The next page in the pagination';
    const TotalItems_Text = 'The total of the items in the pagination';
    const CountItems_Text = 'The count of the items in the pagination';

    public static function paginationResponse(): array
    {
        return [
            self::Message => [
                GraphQLTypeEnum::Type => Type::string(),
                GraphQLTypeEnum::Description => self::Message_Text,
            ],
            self::HttpCode => [
                GraphQLTypeEnum::Type => Type::int(),
                GraphQLTypeEnum::Description => self::HttpCode_Text,
            ],
            self::HttpStatus => [
                GraphQLTypeEnum::Type => Type::string(),
                GraphQLTypeEnum::Description => self::HttpStatus_Text,
            ],
            self::IsPaginated => [
                GraphQLTypeEnum::Type => Type::int(),
                GraphQLTypeEnum::Description => self::IsPaginated_Text,
            ],
            self::CurrentPage => [
                GraphQLTypeEnum::Type => Type::int(),
                GraphQLTypeEnum::Description => self::CurrentPage_Text,
            ],
            self::LastPage => [
                GraphQLTypeEnum::Type => Type::int(),
                GraphQLTypeEnum::Description => self::LastPage_Text,
            ],
            self::PerPage => [
                GraphQLTypeEnum::Type => Type::int(),
                GraphQLTypeEnum::Description => self::PerPage_Text,
            ],
            self::FromPage => [
                GraphQLTypeEnum::Type => Type::int(),
                GraphQLTypeEnum::Description => self::FromPage_Text,
            ],
            self::ToPage => [
                GraphQLTypeEnum::Type => Type::int(),
                GraphQLTypeEnum::Description => self::ToPage_Text,
            ],
            self::TotalItems => [
                GraphQLTypeEnum::Type => Type::int(),
                GraphQLTypeEnum::Description => self::TotalItems_Text,
            ],
            self::CountItems => [
                GraphQLTypeEnum::Type => Type::int(),
                GraphQLTypeEnum::Description => self::CountItems_Text,
            ],
        ];
    }
}
