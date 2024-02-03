<?php

namespace App\Enums;

/**
 * Class GenderEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Id
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class GenderEnum
{
    /** Model */
    const Table = 'setting_genders';
    const Id = 'id';
    const Name = 'name';
    const Slug = 'slug';
    const CreatedAt = 'created_at';
    const UpdatedAt = 'updated_at';

    /** Relations */
    const Users = 'users';

    /** Data */
    const MALE_ID = 1;
    const FEMALE_ID = 2;


    /** GraphQL */

    /** Seeders */

    /** DefaultData */
    const DefaultData = [
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Masculino',
                LanguageEnum::LANG_EN => 'Male',
            ],
            self::Slug => 'M',
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Femenino',
                LanguageEnum::LANG_EN => 'Female',
            ],
            self::Slug => 'F',
        ],
    ];
}
