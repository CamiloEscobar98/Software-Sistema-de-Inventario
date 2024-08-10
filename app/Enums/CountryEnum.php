<?php

namespace App\Enums;

/**
 * Class CountryEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const Table
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 * 
 * @property const Departments
 * @property const Cities
 * 
 * @property const TypeName
 * @property const TypeDescription
 */
class CountryEnum
{
    /** Model */
    const Table = "setting_countries";
    const Id = 'id';
    const Name = "name";
    const Slug = "slug";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";

    /** Relations */
    const Departments = 'departments';
    const Cities = 'cities';

    /** GraphQL */
    const TypeName = 'Country';
    const TypeDescription = 'The GraphQL Type of the Country model';

    const TypePaginatedName =  'CountryListResponse';
    const TypePaginatedDescription = 'A structure for the Country response as data list';

    /** Factories */
    const SlugCount = 5;

    const Fields = [self::Id, self::Name, self::Slug, self::CreatedAt, self::UpdatedAt];
}
