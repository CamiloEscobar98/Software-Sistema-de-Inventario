<?php

namespace App\Enums;

/**
 * Class CountryEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const NAME
 * @property const SLUG
 * @property const CREATED_AT
 * @property const UPDATED_AT
 * 
 * @property const Departments
 * @property const Cities
 * 
 * @property const GRAPHQL_TYPE_NAME
 * @property const GRAPHQL_TYPE_DESCRIPTION
 */
class CountryEnum
{
    /** Model */
    const TABLE = "setting_countries";
    const ID = 'id';
    const NAME = "name";
    const SLUG = "slug";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    /** Relations */
    const Departments = 'departments';
    const Cities = 'cities';

    /** GraphQL */
    const GRAPHQL_TYPE_NAME = 'Country';
    const GRAPHQL_TYPE_DESCRIPTION = 'The GraphQL Type of the Country model';

    const TypePaginatedName =  'CountryListResponse';
    const TypePaginatedDescription = 'A structure for the Country response as data list';

    /** Factories */
    const SLUG_COUNT = 5;

    const FIELDS = [self::ID, self::NAME, self::SLUG, self::CREATED_AT, self::UPDATED_AT];
}
