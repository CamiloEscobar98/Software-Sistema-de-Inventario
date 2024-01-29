<?php

namespace App\Enums;


/**
 * Class CountryEnum
 * @package App\Enums
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
}
