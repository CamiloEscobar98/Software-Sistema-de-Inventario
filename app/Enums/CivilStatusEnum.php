<?php

namespace App\Enums;

/**
 * Class CivilStatusEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class CivilStatusEnum
{
    /** Model */
    const Table = "setting_civil_statuses";
    const Id = "id";
    const Name = "name";
    const Slug = "slug";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";

    /** Relations */

    /** Factories */
    const SlugCount = 5;

    /** GraphQL */
}
