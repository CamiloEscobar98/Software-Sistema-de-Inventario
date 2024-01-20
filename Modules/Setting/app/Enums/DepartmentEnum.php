<?php

namespace Modules\Setting\app\Enums;

/**
 * Class DepartmentEnum
 * @package Modules\Setting\app\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const CountryId
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class DepartmentEnum
{
    const Table = "setting_departments";
    const CountryId = "country_id";
    const Name = "name";
    const Slug = "slug";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
