<?php

namespace App\Enums;

use GraphQL\Type\Definition\Type;

use App\Enums\GraphQLTypeEnum;

class ResponseEnum
{
    const MESSAGE = 'message';
    const HTTP_CODE = 'http_code';
    const HTTP_STATUS = 'http_status';
    const DATA = 'data';

    const MESSAGE_TEXT = 'The message for the response';
    const HTTP_CODE_TEXT = 'The Http Code for the response';
    const HTTP_STATUS_TEXT = 'The Http Status for the response';

    /**
     * Pagination
     * The consts for the pagination of the response GraphQL Type Structure.
     */
    const IS_PAGINATED = 'is_paginated';
    const CURRENT_PAGE = 'current_page';
    const LAST_PAGE = 'last_page';
    const PER_PAGE = 'per_page';
    const FROM_PAGE = 'from';
    const TO_PAGE = 'to';
    const TOTAL_ITEMS = 'total';
    const COUNT_ITEMS = 'count';

    const IS_PAGINATED_TEXT = 'If the response has data paginated';
    const CURRENT_PAGE_TEXT = 'The current page in the pagination';
    const LAST_PAGE_TEXT = 'The last page in the pagination';
    const PER_PAGE_TEXT = 'The number of the items per page';
    const FROM_PAGE_TEXT = 'The page before in the pagination';
    const TO_PAGE_TEXT = 'The next page in the pagination';
    const TOTAL_ITEMS_TEXT = 'The total of the items in the pagination';
    const COUNT_ITEMS_TEXT = 'The count of the items in the pagination';

    public static function paginationStructureResponse(): array
    {
        return [
            self::MESSAGE => [
                GraphQLTypeEnum::TYPE => Type::string(),
                GraphQLTypeEnum::DESCRIPTION => self::MESSAGE_TEXT,
                GraphQLTypeEnum::RESOLVE => fn($root, $args) => "Hi"
            ],
            self::HTTP_CODE => [
                GraphQLTypeEnum::TYPE => Type::int(),
                GraphQLTypeEnum::DESCRIPTION => self::HTTP_CODE_TEXT,
                GraphQLTypeEnum::RESOLVE => fn($root, $args) => "Hi"
            ],
            self::HTTP_STATUS => [
                GraphQLTypeEnum::TYPE => Type::string(),
                GraphQLTypeEnum::DESCRIPTION => self::HTTP_STATUS_TEXT,
            ],
            self::IS_PAGINATED => [
                GraphQLTypeEnum::TYPE => Type::int(),
                GraphQLTypeEnum::DESCRIPTION => self::IS_PAGINATED_TEXT,
            ],
            self::CURRENT_PAGE => [
                GraphQLTypeEnum::TYPE => Type::int(),
                GraphQLTypeEnum::DESCRIPTION => self::CURRENT_PAGE_TEXT,
            ],
            self::LAST_PAGE => [
                GraphQLTypeEnum::TYPE => Type::int(),
                GraphQLTypeEnum::DESCRIPTION => self::LAST_PAGE_TEXT,
            ],
            self::PER_PAGE => [
                GraphQLTypeEnum::TYPE => Type::int(),
                GraphQLTypeEnum::DESCRIPTION => self::PER_PAGE_TEXT,
            ],
            self::FROM_PAGE => [
                GraphQLTypeEnum::TYPE => Type::int(),
                GraphQLTypeEnum::DESCRIPTION => self::FROM_PAGE_TEXT,
            ],
            self::TO_PAGE => [
                GraphQLTypeEnum::TYPE => Type::int(),
                GraphQLTypeEnum::DESCRIPTION => self::TO_PAGE_TEXT,
            ],
            self::TOTAL_ITEMS => [
                GraphQLTypeEnum::TYPE => Type::int(),
                GraphQLTypeEnum::DESCRIPTION => self::TOTAL_ITEMS_TEXT,
            ],
            self::COUNT_ITEMS => [
                GraphQLTypeEnum::TYPE => Type::int(),
                GraphQLTypeEnum::DESCRIPTION => self::COUNT_ITEMS_TEXT,
            ],
        ];
    }

    public static function buildPaginationResponse(...$tmp)
    {
        [$message, $httpCode, $httpStatus, $isPaginated] = $tmp;

        return [
            self::MESSAGE => $message,
            self::HTTP_CODE => $httpCode,
            self::HTTP_STATUS => $httpStatus,
            self::IS_PAGINATED => $isPaginated,
        ];
    }
}
