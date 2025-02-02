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
 * @property const RELATION_DEPARMENT
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
    const RELATION_DEPARMENT = 'department';
    const RELATION_COUNTRY = 'country';
}
