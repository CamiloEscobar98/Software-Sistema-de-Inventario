<?php

namespace App\Enums;

/**
 * Class GenderEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const ID
 * @property const NAME
 * @property const SLUG
 * @property const CREATED_AT
 * @property const UPDATED_AT
 */
class GenderEnum
{
    /** Model */
    const TABLE = 'setting_genders';
    const ID = 'id';
    const NAME = 'name';
    const SLUG = 'slug';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /** ./Model */

    /** Relations */
    const Users = 'users';
    /** ./Relations */

    /** Data */
    const MALE_ID = 1;
    const FEMALE_ID = 2;
    /** ./Data */


    /** GraphQL */
    /** ./GraphQL */

    /** Seeders */
    /** ./Seeders */

    /** DefaultData */
    const DefaultData = [
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Masculino',
                LanguageEnum::LANG_EN => 'Male',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'masculino',
                LanguageEnum::LANG_EN => 'male'
            ],
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Femenino',
                LanguageEnum::LANG_EN => 'Female',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'femenino',
                LanguageEnum::LANG_EN => 'female'
            ],
        ],
    ];
    /** ./DefaultData */
}
