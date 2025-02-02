<?php

namespace App\Enums;

/**
 * Class DepartmentEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * @property const TABLE
 * @property const ID
 * @property const COUNTRY_ID
 * @property const NAME
 * @property const SLUG
 * @property const CREATED_AT
 * @property const UPDATED_AT
 * @property const CITIES
 * @property const GRAPHQL_TYPE_NAME
 * @property const GRAPHQL_TYPE_DESCRIPTION
 * @property const SLUG_COUNT
 * @property const FIELDS
 */
class DepartmentEnum
{
    /** Model */
    const TABLE = "setting_departments";
    const ID = "id";
    const COUNTRY_ID = "country_id";
    const NAME = "name";
    const SLUG = "slug";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    /** Relations */
    const CITIES = 'cities';

    /** GraphQL */
    const GRAPHQL_TYPE_NAME = 'Department';
    const GRAPHQL_TYPE_DESCRIPTION = 'The GraphQL Type of the Department model';

    /** Factories */
    const SLUG_COUNT = 5;

    const FIELDS = [self::ID, self::COUNTRY_ID, self::NAME, self::SLUG, self::CREATED_AT, self::UPDATED_AT];
}
