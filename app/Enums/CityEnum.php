<?php

namespace App\Enums;

/**
 * Class CityEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Id
 * @property const DepartmentId
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class CityEnum
{
    /** Model */
    const Table = "setting_cities";
    const Id = "id";
    const DepartmentId = "department_id";
    const Name = "name";
    const Slug = "slug";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";

    /** Relations */


    /** GraphQL */
    const TypeName = 'City';
    const TypeDescription = 'The GraphQL Type of the City model';

    const Fields = [self::Id, self::DepartmentId, self::Name, self::Slug, self::CreatedAt, self::UpdatedAt];
}
