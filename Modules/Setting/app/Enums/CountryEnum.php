<?php

namespace Modules\Setting\app\Enums;


/**
 * Class CountryEnum
 * @package Modules\Setting\app\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class CountryEnum
{
    const Table = "setting_countries";
    const Name = "name";
    const Slug = "slug";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
