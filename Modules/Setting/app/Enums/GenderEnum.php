<?php

namespace Modules\Setting\app\Enums;

/**
 * Class GenderEnum
 * @package Modules\Setting\app\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class GenderEnum
{
    const Table = "setting_genders";
    const Name = "name";
    const Slug = "slug";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
