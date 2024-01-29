<?php

namespace App\Enums;

/**
 * Class DepartmentEnum
 * @package App\Enums
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
    /** Model */
    const Table = "setting_departments";
    const Id = "id";
    const CountryId = "country_id";
    const Name = "name";
    const Slug = "slug";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";

    /** Relations */
    const Cities = 'cities';

    /** GraphQL */
    const TypeName = 'Department';
    const TypeDescription = 'The GraphQL Type of the Department model';

    const Fields = [self::Id, self::CountryId, self::Name, self::Slug, self::CreatedAt, self::UpdatedAt];
}
