<?php

namespace App\Enums;

/**
 * Class CityEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * @property const TABLE
 * @property const ID
 * @property const DEPARTMENT_ID
 * @property const NAME
 * @property const SLUG
 * @property const CREATED_AT
 * @property const UPDATED_AT
 * @property const GRAPHQL_TYPE_NAME
 * @property const GRAPHQL_TYPE_DESCRIPTION
 * @property const SLUG_COUNT
 * @property const FIELDS
 */
class CityEnum
{
    /** Model */
    const TABLE = "setting_cities";
    const ID = "id";
    const DEPARTMENT_ID = "department_id";
    const NAME = "name";
    const SLUG = "slug";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    /** Relations */


    /** GraphQL */
    const GRAPHQL_TYPE_NAME = 'City';
    const GRAPHQL_TYPE_DESCRIPTION = 'The GraphQL Type of the City model';

    /** Factories */
    const SLUG_COUNT = 5;

    const FIELDS = [self::ID, self::DEPARTMENT_ID, self::NAME, self::SLUG, self::CREATED_AT, self::UPDATED_AT];
}
