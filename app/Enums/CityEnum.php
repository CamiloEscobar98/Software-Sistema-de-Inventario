<?php

namespace App\Enums;

/**
 * Class CityEnum
 * @package App\Enums
 * 
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
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

    /** Factories */
    const SlugCount = 5;

    const Fields = [self::Id, self::DepartmentId, self::Name, self::Slug, self::CreatedAt, self::UpdatedAt];
}
